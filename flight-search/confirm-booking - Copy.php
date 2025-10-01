<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../mailer/PHPMailer-master/src/Exception.php';
require '../mailer/PHPMailer-master/src/PHPMailer.php';
require '../mailer/PHPMailer-master/src/SMTP.php';


// Get submitted data
$offerId       = $_POST['offerId'] ?? null;
$selectedOffer = $_SESSION['flights'][$offerId] ?? null;

if (!$selectedOffer) {
    die("❌ Invalid flight selection.");
}

// Passenger Info
$firstNames  = $_POST['first-name'] ?? [];
$middleNames = $_POST['middle-name'] ?? [];
$lastNames   = $_POST['last-name'] ?? [];
$genders     = $_POST['gender'] ?? [];
$dob         = $_POST['dob'] ?? [];

// Billing Info
$address1 = $_POST['address1'] ?? '';
$address2 = $_POST['address2'] ?? '';
$country  = $_POST['country'] ?? '';
$state    = $_POST['state'] ?? '';
$city     = $_POST['city'] ?? '';
$zip      = $_POST['zip'] ?? '';

// Contact Info
$contact_info_phone = $_POST['phone'] ?? '';
$contact_inf_email = $_POST['email'] ?? '';

// --- Build passengers array in Amadeus format ---
$passengers = [];
for ($i = 0; $i < count($firstNames); $i++) {
    $passengers[] = [
        "id" => (string)($i+1),
        "dateOfBirth" => !empty($dob[$i]) ? date("Y-m-d", strtotime($dob[$i])) : "2000-01-01",
        "name" => [
            "firstName" => ucfirst(trim($firstNames[$i])),
            "lastName"  => ucfirst(trim($lastNames[$i]))
        ],
        "gender" => strtoupper($genders[$i] ?? "MALE"),
        "contact" => [
            "emailAddress" => $contact_inf_email,
            "phones" => [[
                "deviceType" => "MOBILE",
                "countryCallingCode" => "91", // ⚠️ adjust dynamically if needed
                "number" => $contact_info_phone
            ]]
        ],
        "documents" => [[
            "documentType"    => "PASSPORT",
            "number"          => "X1234567",       // placeholder
            "expiryDate"      => "2030-01-01",     // placeholder
            "issuanceCountry" => strtoupper($country ?: "IN"),
            "nationality"     => strtoupper($country ?: "IN"),
            "holder"          => true
        ]]
    ];
}

// Save to session for finalize-booking.php
$_SESSION['passengers'] = $passengers;
$_SESSION['billing'] = [
    "address1" => $address1,
    "address2" => $address2,
    "country"  => $country,
    "state"    => $state,
    "city"     => $city,
    "zip"      => $zip
];
$_SESSION['contact'] = [
    "phone" => $contact_info_phone,
    "email" => $contact_inf_email
];

function getCurrencySymbol($currency) {
    $symbols = [
        "USD" => "$", "EUR" => "€", "GBP" => "£", "INR" => "₹",
        "AED" => "د.إ", "JPY" => "¥", "CNY" => "¥", "CAD" => "C$",
        "AUD" => "A$", "CHF" => "CHF",
    ];
    return $symbols[$currency] ?? $currency;
}

// 🔑 Amadeus API credentials
$client_id     = "IMewQoGGzsLuxu2vR2r9ImKFeRVNbf4m";
$client_secret = "bLW0u8zhqigZYcaC";

// ✅ Get Access Token
function getAmadeusToken($client_id, $client_secret) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://test.api.amadeus.com/v1/security/oauth2/token");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        "grant_type"    => "client_credentials",
        "client_id"     => $client_id,
        "client_secret" => $client_secret
    ]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);
    return $data["access_token"] ?? null;
}

$token = getAmadeusToken($client_id, $client_secret);

// ✅ Fetch Airport Full Name
function getAirportName($iataCode, $token) {
    static $airportCache = [];

    if (isset($airportCache[$iataCode])) {
        return $airportCache[$iataCode];
    }

    $url = "https://test.api.amadeus.com/v1/reference-data/locations?subType=AIRPORT&keyword=" . urlencode($iataCode);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer $token"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($res, true);
    $airportName = $data["data"][0]["name"] ?? $iataCode;
    $airportCache[$iataCode] = $airportName;

    return $airportName;
}

// ✅ Fetch Airline Full Name (Amadeus Dictionary or local mapping)
function getAirlineName($carrierCode) {
    $airlines = [
        "AI" => "Air India",
        "UK" => "Vistara",
        "6E" => "IndiGo",
        "SG" => "SpiceJet",
        "G8" => "Go First",
        "EK" => "Emirates",
        "QR" => "Qatar Airways",
        "BA" => "British Airways",
        "LH" => "Lufthansa",
        // ➕ add more codes as needed
    ];
    return $airlines[$carrierCode] ?? $carrierCode;
}
?>

<?php 
  include ("../lang-change.php");
?>


<?php
// ========================
// Send Email Notification
// ========================
$mail = new PHPMailer(true);

try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host       = "mail.reservamisreservas.com"; // Or your domain mail server
    $mail->SMTPAuth   = true;
    $mail->Username   = "info@reservamisreservas.com"; 
    $mail->Password   = "SuNi-info@321#";  
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;

    $mail->CharSet = "UTF-8";

    // From & To
    $mail->setFrom("info@reservamisreservas.com", "Reserva Mi Reservas");
    $mail->addAddress($contact_inf_email, $firstNames[0] . " " . $lastNames[0]); // Customer
    $mail->addAddress("info@reservamisreservas.com", "New Booking"); // Admin

    // Subject
    $mail->Subject = "✈️ Booking Confirmation - " . $selectedOffer["itineraries"][0]["segments"][0]["departure"]["iataCode"] . " to " . $selectedOffer["itineraries"][0]["segments"][count($selectedOffer["itineraries"][0]["segments"])-1]["arrival"]["iataCode"];
    
    // Message Body
    $body  = "<h2>Booking Confirmation</h2>";
    $body .= "<p><strong>Passenger(s):</strong></p><ul>";
    for ($i = 0; $i < count($firstNames); $i++) {
        $body .= "<li>" . htmlspecialchars($firstNames[$i]) . " " . htmlspecialchars($lastNames[$i]) . " (" . strtoupper($genders[$i]) . ")</li>";
    }
    $body .= "</ul>";

    $body .= "<p><strong>Contact:</strong> " . htmlspecialchars($contact_inf_email) . " | " . htmlspecialchars($contact_info_phone) . "</p>";
    $body .= "<p><strong>Total Price:</strong> " . getCurrencySymbol($selectedOffer["price"]["currency"]) . " " . $selectedOffer["price"]["total"] . "</p>";
    $body .= "<p><strong>Billing Address:</strong> " . htmlspecialchars($address1 . " " . $address2 . ", " . $city . ", " . $state . ", " . $country . " - " . $zip) . "</p>";
    $body .= "<p>Thank you for booking with us. Please proceed to payment to confirm your seat.</p>";

    $mail->isHTML(true);
    $mail->Body = $body;

    // Send
    $mail->send();
    // You can also log success to a file if needed
} catch (Exception $e) {
    error_log("Mailer Error: " . $mail->ErrorInfo);
}

    ?>
<!DOCTYPE html>
<html lang="<?php echo $lang;?>">
<head>
  <meta charset="UTF-8">
  <title>Booking Confirmation</title>
  <?php include("../header.php") ?>
  <style>
    /*body { background:#f9f9f9; }*/
    
    .confirm-heading { font-size:22px; font-weight:600; margin-bottom:15px; }
    .success-msg_web2 { font-size:20px; font-weight:600; color:#28a745; }
  </style>

<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="booking-review-card">
          <h3 class="main-title text-success pt-0 pb-1 mb-0">✅ Your booking details have been received!</h3>
          <P class="main-prgh mb-0">Please review your details below. We will contact you regarding your flight booking</P>
        </div>

        <input type="hidden" name="adults" value="<?= $adults ?>" id="adults">
        <input type="hidden" name="children" value="<?= $children ?>" id="children">
        <input type="hidden" name="infants" value="<?= $infants ?>" id="infants">

        <!-- Passenger Info -->
        <div class="confirm-box">
            <h3 class="main-subhding pt-0 pb-3">Passenger Details</h3>
            <!--Start Desktop Design -->
            <div class="table-responsive d-none d-md-block">
                <table class="table passenger_table_web2">
                    <thead>
                        <tr>
                            <th>Passenger</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 0; $i < count($firstNames); $i++): ?>
                        <tr>
                            <td><?= $i+1 ?></td>
                            <td><?= htmlspecialchars($firstNames[$i]) ?> <?= htmlspecialchars($lastNames[$i]) ?></td>
                            <td><?= htmlspecialchars(strtoupper($genders[$i])) ?></td>
                            <td><?= htmlspecialchars($dob[$i]) ?></td>
                            <td>
                                <?php 
                                if (!empty($dob[$i])) {
                                    $dobDate = new DateTime($dob[$i]);
                                    $today   = new DateTime();
                                    $age     = $today->diff($dobDate)->y;
                                    echo $age;
                                } else {
                                    echo "-";
                                }
                                ?>
                            </td>
                        </tr>
                        <?php endfor; ?>   
                    </tbody>
                </table>
            </div>
            <!--End Desktop Design -->
            
            <!--Start Mobile Design -->
            <?php for($i = 0; $i < count($firstNames); $i++): ?>
            <div class="passenger-mob-zdesign d-block d-md-none">
                <div class="row">
                    <div class="col-auto">
                        <div class="passenger-mob-num"><?= $i+1 ?></div>
                    </div>
                    <div class="col">
                        <div class="d-flex gap-3">
                            <p class="passenger-mob-name"><?= htmlspecialchars($firstNames[$i]) ?> <?= htmlspecialchars($lastNames[$i]) ?></p>
                            <p class="passenger-mob-gender">(<?= htmlspecialchars(strtoupper($genders[$i])) ?>)</p>
                        </div>    
                        <p class="passenger-mob-dob">
                            <?= htmlspecialchars($dob[$i]) ?> 
                            (<?php 
                                if (!empty($dob[$i])) {
                                    $dobDate = new DateTime($dob[$i]);
                                    $today   = new DateTime();
                                    $age     = $today->diff($dobDate)->y;
                                    echo $age;
                                } else {
                                    echo "-";
                                }
                                ?>)
                        </p>
                    </div>
                </div>
            </div>
            <?php endfor; ?>   
            <!--Start Mobile Design -->

        </div>

        <!-- Billing Info -->
        <div class="confirm-box">
            <h3 class="main-subhding pt-0 pb-3">Address Information</h3>
            <p class="main-prgh pb-1 mb-0"><span class="summary-label">Address:</span> <?= htmlspecialchars($address1.' '.$address2) ?></p>
            <p class="main-prgh pb-1 mb-0"><span class="summary-label">City:</span> <?= htmlspecialchars($city) ?>, <?= htmlspecialchars($state) ?></p>
            <p class="main-prgh pb-1 mb-0"><span class="summary-label">Country:</span> <?= htmlspecialchars($country) ?></p>
            <p class="main-prgh pb-1 mb-0"><span class="summary-label">Zip Code:</span> <?= htmlspecialchars($zip) ?></p>
        </div>

        <!-- Contact Info -->
        <div class="confirm-box">
            <h3 class="main-subhding pt-0 pb-3">Contact Information</h3>
            <p class="main-prgh pb-1 mb-0"><span class="summary-label">Phone:</span> <?= htmlspecialchars($contact_info_phone) ?></p>
            <p class="main-prgh pb-1 mb-0"><span class="summary-label">Email:</span> <?= htmlspecialchars($contact_inf_email) ?></p>
        </div>

      </div>
      <div class="col-md-12 col-lg-4">
        <div class="confirm-box position-sticky top-0">
            <h3 class="main-subhding pt-0">Flight Details</h3>
            <hr>
            <?php if ($selectedOffer): ?>
            <div class="">
                <?php foreach ($selectedOffer["itineraries"] as $itinerary): ?>
                  <?php
                    $segments  = $itinerary["segments"];
                    $firstSeg  = $segments[0];
                    $lastSeg   = $segments[count($segments)-1];

                    $depTime   = date("h:i A", strtotime($firstSeg["departure"]["at"]));
                    $arrTime   = date("h:i A", strtotime($lastSeg["arrival"]["at"]));
                    $depAirport = $firstSeg["departure"]["iataCode"];
                    $arrAirport = $lastSeg["arrival"]["iataCode"];

                    // duration
                    $depDT = strtotime($firstSeg["departure"]["at"]);
                    $arrDT = strtotime($lastSeg["arrival"]["at"]);
                    $durationMin = round(($arrDT - $depDT)/60);
                    $hrs = floor($durationMin / 60);
                    $mins = $durationMin % 60;
                    $duration = "{$hrs}h {$mins}m";

                    // airline
                    $airlineCode = $firstSeg["carrierCode"];
                    $airlineName = getAirlineName($airlineCode);

                    $depAirportCode = $firstSeg["departure"]["iataCode"];
                    $arrAirportCode = $lastSeg["arrival"]["iataCode"];

                    $depAirportFull = getAirportName($depAirportCode, $token);
                    $arrAirportFull = getAirportName($arrAirportCode, $token);

                    $logoUrl = "https://static.tripcdn.com/packages/flight/airline-logo/latest/airline_logo/3x/" . strtolower($airlineCode) . ".webp";

                    $stops = count($segments) - 1;
                  ?>
                <div class="row align-items-center mb-3">
                    <div class="col-6">
                        <div class="d-flex d-md-block align-items-center gap-3 mb-2 mb-md-0">
                            <img src="<?= $logoUrl ?>" width="50" alt="<?= $airlineCode ?>">
                            <p class="flight-logo-name">
                                 <?= htmlspecialchars($airlineName) ?> 
                            </p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-end">
                            <div class="flight-result_duration_web2">
                                <?= $duration ?>
                                <div class="flight-duration_line_web2"></div>
                                <?php if ($stops > 0): ?>
                                    <small class="text-muted"><?= $stops ?> Stop<?= $stops > 1 ? "s" : "" ?></small>
                                <?php else: ?>
                                    <small class="text-muted">Non-stop</small>
                                <?php endif; ?>
                            </div> 
                        </div>    
                    </div>
                    <div class="col">
                        <div class="row text-center">
                            <div class="col-12 mb-3">
                                <h5 class="flight-time"><?= $depTime ?></h5>
                                <p class="flight-location"><?= $depAirportFull ?> (<?= $depAirportCode ?>)</p>
                            </div>
                            <div class="col-12">
                                <h5 class="flight-time"><?= $arrTime ?></h5>
                                <p class="flight-location"><?= $arrAirportFull ?> (<?= $arrAirportCode ?>)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
      </div>
      
    </div>
  </div>
</section>


<?php include("../footer.php"); ?>
