<?php
session_start();

// hide warnings from being printed into JSON output (log instead)
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);

// --- Amadeus credentials ---
$client_id = "IMewQoGGzsLuxu2vR2r9ImKFeRVNbf4m";
$client_secret = "bLW0u8zhqigZYcaC";

// helper: curl GET
function curl_get($url, $headers = []) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $body = curl_exec($ch);
    $err = curl_error($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return ['body' => $body, 'error' => $err, 'status' => $status];
}

// helper: curl POST
function curl_post($url, $postFields = [], $headers = []) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postFields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $body = curl_exec($ch);
    $err = curl_error($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return ['body' => $body, 'error' => $err, 'status' => $status];
}

// 1) Get access token
$tokenResp = curl_post(
    "https://test.api.amadeus.com/v1/security/oauth2/token",
    [
        "grant_type"    => "client_credentials",
        "client_id"     => $client_id,
        "client_secret" => $client_secret
    ],
    ["Accept: application/json"]
);

if ($tokenResp['error'] || !$tokenResp['body']) {
    header("Content-Type: application/json");
    echo json_encode(["error" => "Failed to obtain access token", "details" => $tokenResp['error'] ?: $tokenResp['body']]);
    exit;
}

$auth = json_decode($tokenResp['body'], true);
if (!isset($auth['access_token'])) {
    header("Content-Type: application/json");
    echo json_encode(["error" => "Failed to get access token", "details" => $auth]);
    exit;
}
$access_token = $auth['access_token'];

// 2) Read & sanitize input parameters
$origin = isset($_GET['origin']) && $_GET['origin'] !== '' ? strtoupper(preg_replace('/[^A-Z0-9]/i', '', $_GET['origin'])) : "DEL";
$destination = isset($_GET['destination']) && $_GET['destination'] !== '' ? strtoupper(preg_replace('/[^A-Z0-9]/i', '', $_GET['destination'])) : "LHR";
$rawDate = $_GET['date'] ?? '';
if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $rawDate)) {
    $date = $rawDate;
} else {
    $date = date('Y-m-d', strtotime('+7 days'));
}
$adults = (int)($_GET['adults'] ?? 1);
$max = isset($_GET['max']) ? (int)$_GET['max'] : 20;

// ✅ Force all results in USD (change to INR if needed)
$currencyCode = "USD";

// 3) Build offers URL and fetch
$params = [
    'originLocationCode'      => $origin,
    'destinationLocationCode' => $destination,
    'departureDate'           => $date,
    'adults'                  => $adults,
    'max'                     => $max,
    'currencyCode'            => $currencyCode
];
$offersUrl = "https://test.api.amadeus.com/v2/shopping/flight-offers?" . http_build_query($params);

$offersResp = curl_get($offersUrl, ["Authorization: Bearer $access_token", "Accept: application/json"]);

if ($offersResp['error']) {
    header("Content-Type: application/json");
    echo json_encode(["error" => "Curl error while fetching flight offers", "details" => $offersResp['error']]);
    exit;
}

if ($offersResp['status'] >= 400) {
    $body = json_decode($offersResp['body'], true);
    header("Content-Type: application/json");
    echo json_encode($body ?: ["error" => "HTTP error from Amadeus", "status" => $offersResp['status']]);
    exit;
}

$offers = json_decode($offersResp['body'], true);
if ($offers === null) {
    header("Content-Type: application/json");
    echo json_encode(["error" => "Failed to decode flight offers response", "raw" => $offersResp['body']]);
    exit;
}

if (isset($offers['errors'])) {
    header("Content-Type: application/json");
    echo json_encode($offers);
    exit;
}

if (!isset($offers['data']) || empty($offers['data'])) {
    header("Content-Type: application/json");
    echo json_encode(["data" => []]);
    exit;
}

// 4) Collect carrier codes
$carrierCodes = [];
foreach ($offers['data'] as $of) {
    if (!empty($of['itineraries']) && is_array($of['itineraries'])) {
        foreach ($of['itineraries'] as $itin) {
            if (!empty($itin['segments']) && is_array($itin['segments'])) {
                foreach ($itin['segments'] as $seg) {
                    if (!empty($seg['carrierCode'])) {
                        $carrierCodes[$seg['carrierCode']] = true;
                    }
                }
            }
        }
    }
}

$airlineMap = [];
if (!empty($carrierCodes)) {
    $carrierList = implode(",", array_keys($carrierCodes));
    $airlinesUrl = "https://test.api.amadeus.com/v1/reference-data/airlines?airlineCodes=" . urlencode($carrierList);
    $airlinesResp = curl_get($airlinesUrl, ["Authorization: Bearer $access_token", "Accept: application/json"]);

    if (empty($airlinesResp['error']) && $airlinesResp['status'] < 400 && $airlinesResp['body']) {
        $airlines = json_decode($airlinesResp['body'], true);
        if (isset($airlines['data']) && is_array($airlines['data'])) {
            foreach ($airlines['data'] as $a) {
                $code = $a['iataCode'] ?? ($a['icaoCode'] ?? null);
                if ($code) {
                    $airlineMap[$code] = $a['commonName'] ?? $a['businessName'] ?? $code;
                }
            }
        }
    }
}

// 5) Attach airlineName into offers segments
foreach ($offers['data'] as &$offer) {
    if (!empty($offer['itineraries']) && is_array($offer['itineraries'])) {
        foreach ($offer['itineraries'] as &$itin) {
            if (!empty($itin['segments']) && is_array($itin['segments'])) {
                foreach ($itin['segments'] as &$seg) {
                    $code = $seg['carrierCode'] ?? null;
                    if ($code) {
                        $seg['airlineName'] = $airlineMap[$code] ?? $seg['carrierCode'];
                    }
                }
            }
        }
    }
}
unset($offer, $itin, $seg);

// Ensure dictionaries contain carriers
$offers['dictionaries'] = $offers['dictionaries'] ?? [];
if (empty($offers['dictionaries']['carriers'])) {
    $offers['dictionaries']['carriers'] = $airlineMap;
}

// 6) Save offers into session
$_SESSION['offers'] = [];
foreach ($offers['data'] as $of) {
    if (isset($of['id'])) {
        $_SESSION['offers'][$of['id']] = $of;
    }
}
$_SESSION['offers']['dictionaries'] = $offers['dictionaries'];

// 7) Return JSON
header("Content-Type: application/json");
echo json_encode($offers, JSON_UNESCAPED_UNICODE);
exit;
?>
