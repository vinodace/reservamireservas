<?php
session_start();

// --- Basic config & safety vars ---
$results = [];           // prevent "Undefined variable $results"
$errorMessage = null;
$limit = 30;             // number of flights to show initially (used in JS too)

// =====================
// Amadeus API Credentials
// =====================
$client_id     = "IMewQoGGzsLuxu2vR2r9ImKFeRVNbf4m";
$client_secret = "bLW0u8zhqigZYcaC";

// =====================
// Function: Get Access Token
// =====================
function getAccessToken($client_id, $client_secret) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://test.api.amadeus.com/v1/security/oauth2/token");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        "grant_type"    => "client_credentials",
        "client_id"     => $client_id,
        "client_secret" => $client_secret
    ]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        curl_close($ch);
        throw new Exception("Token Request Error: " . curl_error($ch));
    }

    curl_close($ch);
    $data = json_decode($response, true);

    if (!isset($data["access_token"])) {
        throw new Exception("Failed to get access token. Response: " . print_r($data, true));
    }

    return $data["access_token"];
}

// =====================
// Collect Form Inputs
// =====================
$origin_code      = $_GET['origin_code'] ?? '';
$origin_name      = $_GET['origin_name'] ?? '';
$destination_code = $_GET['destination_code'] ?? '';
$destination_name = $_GET['destination_name'] ?? '';

$origin         = strtoupper(trim($_GET['origin'] ?? ''));
$destination    = strtoupper(trim($_GET['destination'] ?? ''));
$departure_date = $_GET['departure_date'] ?? '';
$return_date    = $_GET['return_date'] ?? '';
$trip_type      = $_GET['tripType'] ?? 'oneway';
$travel_class   = ucfirst(strtolower($_GET['travel_class'] ?? 'Economy'));
$adults         = (int)($_GET['adults'] ?? 1);
$children       = (int)($_GET['children'] ?? 0);
$infants        = (int)($_GET['infants'] ?? 0);

$total_passengers = $adults + $children + $infants;
$passenger_summary = $total_passengers . ' Passenger' . ($total_passengers > 1 ? 's' : '') . ' - ' . $travel_class;

// =====================
// Only perform API search when required input exists
// =====================
try {
    if (!empty($origin) && !empty($destination) && !empty($departure_date)) {
        $token = getAccessToken($client_id, $client_secret);

        // Build Flight Search URL
        $url = "https://test.api.amadeus.com/v2/shopping/flight-offers?";
        $params = [
            "originLocationCode"      => $origin,
            "destinationLocationCode" => $destination,
            "departureDate"           => $departure_date,
            "adults"                  => $adults,
            "travelClass"             => strtoupper($travel_class),
            "currencyCode"            => "USD",
            "max"                     => 50 // Flight search Limit
        ];
        if ($trip_type === "roundtrip" && !empty($return_date)) {
            $params["returnDate"] = $return_date;
        }
        if ($children > 0) $params["children"] = $children;
        if ($infants > 0)  $params["infants"]  = $infants;

        $url .= http_build_query($params);

        // Call Amadeus API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer " . $token]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $curlErr = curl_error($ch);
            curl_close($ch);
            throw new Exception("API Request Error: " . $curlErr);
        }

        curl_close($ch);
        $results = json_decode($response, true);
        if (!is_array($results)) {
            $results = [];
            throw new Exception("API returned invalid JSON.");
        }

        // Store results in session so booking.php can find them
        if (!empty($results['data']) && is_array($results['data'])) {
            // reset previous search offers
            $_SESSION['flights'] = [];
            foreach ($results['data'] as $offer) {
                if (isset($offer['id'])) {
                    $_SESSION['flights'][$offer['id']] = $offer;
                }
            }
            // also store dictionaries (airlines etc.)
            $_SESSION['dictionaries'] = $results['dictionaries'] ?? [];
        }
    }
} catch (Exception $ex) {
    // keep page alive but show error message
    $errorMessage = $ex->getMessage();
    // $results stays as [] so the rest of the page won't raise "undefined variable" issues
}

// Currency helper (kept for display)
function getCurrencySymbol($currency) {
    $symbols = [
        "USD" => "$", "EUR" => "€", "GBP" => "£", "INR" => "₹",
        "AED" => "د.إ", "JPY" => "¥", "CNY" => "¥", "CAD" => "C$",
        "AUD" => "A$", "CHF" => "CHF",
    ];
    return $symbols[$currency] ?? $currency;
}
?>
<?php
    // Itinerary MOdal inside Time duration
    function formatDuration($isoDuration) {
        try {
            $interval = new DateInterval($isoDuration);
            $hours = $interval->h + ($interval->d * 24);
            $minutes = $interval->i;
            return sprintf("%dh %02dm", $hours, $minutes);
        } catch (Exception $e) {
            return $isoDuration; // fallback
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flights</title>
<?php include("header.php"); ?>

<section class="flight-search_result_bg_web2">
  <div class="container">
    <div class="row justify-content-center">
      <?php if ($errorMessage): ?>
        <div class="alert alert-danger mt-3"><?= htmlspecialchars($errorMessage) ?></div>
      <?php endif; ?>

      <div class="col-md-3 d-none d-lg-block">
        <div class="flightsidebar_filter-box_web2 pb-2 sticky-sidebar">
          <div class="flightsidebar_padding_web2">
            <h3 class="main-subhding pt-0">Airlines</h3>
            <ul class="flightsidebar_checklist_web2">
              <?php if (!empty($results["dictionaries"]["carriers"])): ?>
                  <?php foreach ($results["dictionaries"]["carriers"] as $code => $name): ?>
                      <?php $checkboxId = 'air_' . strtolower(preg_replace('/\s+/', '_', $code)); ?>
                      <li>
                          <input type="checkbox" id="<?= $checkboxId ?>" class="filter-airline" value="<?= strtolower($code) ?>">
                          <label for="<?= $checkboxId ?>">
                              <img src="https://static.tripcdn.com/packages/flight/airline-logo/latest/airline_logo/3x/<?= strtolower($code) ?>.webp" class="filter-airline-logo_web2" alt="<?= $name ?>">
                              <?= htmlspecialchars($name) ?>
                          </label>
                      </li>
                  <?php endforeach; ?>
              <?php else: ?>
                  <li>No airlines available.</li>
              <?php endif; ?>
            </ul>

            <button id="clearFilters" class="common-btn mt-2">Clear Filters</button>
            <hr>

            <h3 class="main-subhding pt-0">Stop</h3>
            <ul class="flightsidebar_checklist_web2">
              <li><label for="nonstop">Nonstop</label></li>
              <li><label for="1_stop">1 Stop or fewer</label></li>
              <li><label for="2_stop">2 Stop or fewer</label></li>
            </ul>
            <hr>

            <h3 class="main-subhding pt-0">Recommended</h3>
            <ul class="flightsidebar_checklist_web2">
              <li><label for="checked_baggage_included">Checked baggage included</label></li>
              <li><label for="hide_budget_airlines">Hide budget airlines</label></li>
              <li><label for="carry-on_baggage_included">Carry-on baggage included</label></li>
              <li><label for="hide_codeshare_flights">Hide codeshare flights</label></li>
            </ul>
            

            
          </div>
        </div>
      </div>

      <div class="col-md-9">
        <?php
          $count = 0;
          if (!empty($results["data"]) && is_array($results["data"])):
            foreach ($results["data"] as $offer):
                $count++;
                $modalId = 'stopsModal' . preg_replace('/[^a-zA-Z0-9_-]/', '_', $offer['id']);

                // airline code from first itinerary/segment if present
                $airlineCode = '';
                if (!empty($offer["itineraries"][0]["segments"][0])) {
                    $airlineCode = $offer["itineraries"][0]["segments"][0]["carrierCode"] ?? '';
                }
        ?>
            <div class="flight-result-box <?= $count > $limit ? 'd-none extra-flight' : '' ?>" data-airline="<?= htmlspecialchars(strtolower($airlineCode)) ?>">
                <div class="row">
                    <div class="col-md-9">
                        <?php foreach ($offer["itineraries"] as $itinIndex => $itinerary): ?>
                            <?php
                                $segments = $itinerary["segments"];
                                $firstSeg = $segments[0];
                                $lastSeg  = end($segments);

                                $depTime = date("h:i A", strtotime($firstSeg["departure"]["at"]));
                                $arrTime = date("h:i A", strtotime($lastSeg["arrival"]["at"]));
                                $depAirport = $firstSeg["departure"]["iataCode"];
                                $arrAirport = $lastSeg["arrival"]["iataCode"];

                                $depDT = strtotime($firstSeg["departure"]["at"]);
                                $arrDT = strtotime($lastSeg["arrival"]["at"]);
                                $durationMin = round(($arrDT - $depDT)/60);
                                $hrs = floor($durationMin / 60);
                                $mins = $durationMin % 60;
                                $duration = "{$hrs}h {$mins}m";

                                $airlineCode = $firstSeg["carrierCode"];
                                $airlineName = $results["dictionaries"]["carriers"][$airlineCode] ?? $airlineCode;
                                $logoUrl = "https://static.tripcdn.com/packages/flight/airline-logo/latest/airline_logo/3x/" . strtolower($airlineCode) . ".webp";
                                $stops = count($segments) - 1;
                            ?>
                            <div class="row align-items-center mb-3">
                                <div class="col-md-3">
                                    <div class="d-flex d-md-block align-items-center justify-content-between mb-2 mb-md-0">
                                        <div class="d-flex d-md-block align-items-center gap-3">
                                            <img src="<?= htmlspecialchars($logoUrl) ?>" width="50" alt="<?= htmlspecialchars($airlineCode) ?>">
                                            <p class="flight-logo-name"><?= ucwords(strtolower($airlineName)) ?></p>
                                        </div>
                                        <a href="#" class="flight-price d-block d-md-none">
                                            <?= getCurrencySymbol($offer["price"]["currency"]) . " " . $offer["price"]["total"] ?>
                                        </a>
                                    </div>    
                                </div>
                                <div class="col">
                                    <div class="row text-center">
                                        <div class="col-4">
                                            <h5 class="flight-time_web2"><?= $depTime ?></h5>
                                            <p class="flight-location_web2"><?= $depAirport ?></p>
                                        </div>
                                        <div class="col-4">
                                            <div class="flight-result_duration_web2">
                                                <?= $duration ?>
                                                <div class="flight-duration_line_web2">
                                                    <?php if ($stops > 0): ?>
                                                        <?php for ($i = 1; $i <= $stops; $i++): ?>
                                                            <div class="step-<?= $i ?>"></div>
                                                        <?php endfor; ?>
                                                    <?php endif; ?>
                                                    
                                                </div>
                                                <?php if ($stops > 0): ?>
                                                    <small class="text-muted"><?= $stops ?> Stop<?= $stops > 1 ? "s" : "" ?></small>
                                                <?php else: ?>
                                                    <small class="text-muted">Non-stop</small>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="flight-time_web2"><?= $arrTime ?></h5>
                                            <p class="flight-location_web2"><?= $arrAirport ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if (count($offer["itineraries"]) > 1 && $itinIndex == 0): ?>
                                <hr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <div class="col-md-3 d-lg-flex flex-column justify-content-center text-center">
                        <div class="d-flex d-mb-block flex-column justify-content-between justify-content-md-center text-md-center">
                            <div>
                                <a href="#" class="flight-price d-none d-md-block">
                                    <?= getCurrencySymbol($offer["price"]["currency"]) . " " . $offer["price"]["total"] ?>
                                </a>
                            </div>

                            <!-- ensure offer is stored in session (redundant-safe) -->
                            <?php if (isset($offer['id'])) { $_SESSION['flights'][$offer['id']] = $offer; } ?>

                            <!-- Select link: use actual offer id & pass current passenger counts -->
                            <a href="booking.php?offerId=<?= urlencode($offer['id']) ?>&adults=<?= $adults ?>&children=<?= $children ?>&infants=<?= $infants ?>&travel_class=<?= urlencode($travel_class) ?>" class="common-btn fligth-search_btn_web2 mt-0">Select</a>
                        </div>
                        <a href="javascript:void(0)" class="main-prgh text-center d-block text-primary pt-1" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>">Itinerary</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="<?= $modalId ?>" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Stopover Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <?php foreach ($offer['itineraries'] as $iIndex => $itinerary): ?>
                        
                      <div class="d-flex align-items-center justify-content-between">
                        <h6 class="main-subhding main_color_web2 pb-2">Itinerary <?= $iIndex + 1 ?></h6>

                        <?php
                            $rawDuration = $itinerary['duration'] ?? '';
                            $durationFormatted = $rawDuration ? formatDuration($rawDuration) : 'N/A';
                        ?>
                        <p class="main-subhding mb-0 pb-2">Duration: <?= $durationFormatted ?></p>
                      </div>  
                      <ul class="list-group mb-3">
                        <?php foreach ($itinerary['segments'] as $segIndex => $seg): ?>
                          <?php
                            $airlineCode = $seg["carrierCode"];
                            $airlineName = $results["dictionaries"]["carriers"][$airlineCode] ?? $airlineCode;
                            $depAirport = $seg["departure"]["iataCode"] ?? '';
                            $depTime = isset($seg["departure"]["at"]) ? date("h:i A", strtotime($seg["departure"]["at"])) : '';
                            $arrAirport = $seg["arrival"]["iataCode"] ?? '';
                            $arrTime = isset($seg["arrival"]["at"]) ? date("h:i A", strtotime($seg["arrival"]["at"])) : '';
                          ?>
                          <li class="list-group-item">
                            <div><strong><?= htmlspecialchars($depAirport) ?> (<?= $depTime ?>) → <?= htmlspecialchars($arrAirport) ?> (<?= $arrTime ?>)</strong></div>
                            <div>Carrier: <?= htmlspecialchars($airlineName) ?> (<?= htmlspecialchars($airlineCode) ?>)</div>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>

        <?php
            endforeach; // offers
            if ($count > $limit): ?>
                <div class="text-center mt-3">
                    <button id="showMoreBtn" class="common-btn bg-warning border-warning text-dark">Show More Flights</button>
                </div>
            <?php endif;
        else: ?>
            <div class="col-sm-12 col-md-12 mb-5" id="waiting-loader">
                <div class="search-formbox_web2 flightsidebar_filter-box_web2">
                  <div class="d-flex justify-content-center align-items-center gap-4 pb-4">
                    <div class="w-50">
                      <p class="search-form_title_web2 text-center">Leaving From</p>
                      <h1 class="search-form_name_web2 text-center"><?= htmlspecialchars($origin_name) ?></h1>
                      <p class="main-prgh text-center text-info"><?= htmlspecialchars($origin) ?></p>
                    </div>
                    <h1 class="search-form_to_web2 text-center"> TO</h1>
                    <div class="w-50">
                      <p class="search-form_title_web2 text-center">Going To</p>
                      <h1 class="search-form_name_web2 text-center"><?= htmlspecialchars($destination_name) ?></h1>
                      <p class="main-prgh text-center text-info"><?= htmlspecialchars($destination) ?></p>
                    </div>
                  </div>
                  <ul class="search-form_list_web2">
                    <li>Departure Date: <?= htmlspecialchars($departure_date) ?></li>
                    <?php if (!empty($return_date)) { echo "<li>Return Date: " . htmlspecialchars($return_date) . "</li>"; } ?>
                  </ul>
                  <p class="main-prgh text-center pt-2">Prices shown are per guest, inclusive of taxes and port fees. Additional baggage fees may apply.</p>
                  <h2 class="wait_hding_web2 pt-4">Please Wait...</h2>
                  <p class="main-prgh text-center fw-bold">We are Searching Airline Fares For You From Over 450 + Airlines</p>

                  <img src="images/loader.gif" alt="loader" class="search-form_loader_web2">
                  <p class="main-prgh text-center">Still searching... Have questions? Our experts are just a call away</p>
                  <a href="tel:<?= htmlspecialchars($phone_number_web2 ?? '') ?>" class="search-form_callbtn_web2"><i class="fa-solid fa-phone-volume"></i> Call Us <?= htmlspecialchars($phone_number_web2 ?? '') ?></a>
                </div>
            </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<!-- Bootstrap/JS includes -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function(){
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
});
</script>
<?php include("footer.php"); ?>

<!-- passenger UI script (keeps counts in hidden inputs so booking link uses them) -->
<script>
 document.addEventListener('DOMContentLoaded', () => {
    const displayBox = document.getElementById('passengerClassDisplay');
    const dropdownPanel = document.getElementById('passengerDropdown');
    const travelSelect = document.getElementById('travelClass');

    const counts = {
        adult: <?= $adults ?>,
        child: <?= $children ?>,
        infant: <?= $infants ?>
    };

    function updateDisplay() {
        const travelClass = travelSelect.value;
        const totalPassengers = counts.adult + counts.child + counts.infant;
        displayBox.textContent = `${totalPassengers} Passenger${totalPassengers>1?'s':''} - ${travelClass}`;
        document.getElementById('adults').value = counts.adult;
        document.getElementById('children').value = counts.child;
        document.getElementById('infants').value = counts.infant;
        document.getElementById('cabin_class').value = travelClass;
        document.getElementById('passenger').value = `${totalPassengers} Passenger${totalPassengers>1?'s':''} - ${travelClass}`;
    }

    function changeCount(type, delta) {
        if (counts[type] + delta >= 0) {
            counts[type] += delta;
            document.getElementById(type + 'Count').textContent = counts[type];
            updateDisplay();
        }
    }

    // wire up buttons
    document.querySelectorAll(".count-btn").forEach(btn => {
        btn.addEventListener("click", function() {
            const type = this.getAttribute('data-type');
            const delta = parseInt(this.getAttribute('data-delta'), 10);
            changeCount(type, delta);
        });
    });

    displayBox.addEventListener('click', () => {
        dropdownPanel.style.display = dropdownPanel.style.display === 'block' ? 'none' : 'block';
    });

    document.addEventListener('click', e => {
        if (!e.target.closest('#passengerDropdown') && !e.target.closest('#passengerClassDisplay')) {
            dropdownPanel.style.display = 'none';
        }
    });

    document.getElementById('confirmPassengerBtn')?.addEventListener('click', () => {
        updateDisplay();
        dropdownPanel.style.display = 'none';
    });

    travelSelect.addEventListener('change', updateDisplay);

    updateDisplay(); // initialize summary
});
</script>

<!-- show more flights -->
<script>
document.getElementById("showMoreBtn")?.addEventListener("click", function () {
    let hiddenFlights = document.querySelectorAll(".extra-flight.d-none");
    hiddenFlights.forEach(el => el.classList.remove("d-none"));
    this.style.display = "none";
});
</script>

<!-- Flight airport list autocomplete -->

<script>
  // 🔑 Amadeus API credentials
  const client_id = "IMewQoGGzsLuxu2vR2r9ImKFeRVNbf4m";
  const client_secret = "bLW0u8zhqigZYcaC";
  // Get Amadeus access token
  async function getAccessToken() {
    const res = await fetch("https://test.api.amadeus.com/v1/security/oauth2/token", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: new URLSearchParams({
        grant_type: "client_credentials",
        client_id: client_id,
        client_secret: client_secret
      })
    });
    const data = await res.json();
    return data.access_token;
  }

  // Setup autocomplete
  function setupAutocomplete(inputId, hiddenCodeId, hiddenNameId) {
    getAccessToken().then(token => {
      $("#" + inputId).autocomplete({
        minLength: 2, // user can start typing earlier
        source: function(request, response) {
          fetch(`https://test.api.amadeus.com/v1/reference-data/locations?subType=AIRPORT,CITY&keyword=${request.term}&page[limit]=20`, {
            headers: { "Authorization": "Bearer " + token }
          })
          .then(res => res.json())
          .then(data => {
            if (!data.data) return response([]);
            response(data.data.map(airport => {
              const city = airport.address?.cityName || airport.name;
              return {
                label: `${airport.name} (${airport.iataCode}) - ${city}, ${airport.address?.countryName || ""}`,
                //label: `${airport.name} (${airport.iataCode}) - ${airport.address?.cityName || ""}`,
                value: `${airport.name} (${airport.iataCode})`, // show nice text in input
                code: airport.iataCode,   // store IATA in hidden field
                name: airport.name        // store airport name in hidden field
              };
            }));
          })
          .catch(() => response([]));
        },
        select: function(event, ui) {
          $("#" + inputId).val(ui.item.value);      // show full name in input
          $("#" + hiddenCodeId).val(ui.item.code);  // save IATA code
          $("#" + hiddenNameId).val(ui.item.name);  // save airport name
          return false;
        }
      });
    });
  }

  // Apply autocomplete
  $(document).ready(function() {
    setupAutocomplete("fromAirport", "fromAirportCode", "fromAirportName");
    setupAutocomplete("toAirport", "toAirportCode", "toAirportName");
  });
</script>

<!-- Datepicker of departure date differnt from home page code because in this code when data fetched from one way departure date then select round trip and choose return date then it will not take previous date from departure date -->
<script>
  $(function () {
      // Departure date picker
      $("#departDate").datepicker({
          dateFormat: "yy-mm-dd",
          minDate: 0,
          numberOfMonths: 2,
          onSelect: function (selectedDate) {
              // Set minDate for return date
              $("#returnDate").datepicker("option", "minDate", selectedDate);
              // If roundtrip, auto-show return calendar
              if ($('input[name="tripType"]:checked').val() === 'roundtrip') {
                  setTimeout(function () {
                      $("#returnDate").datepicker("show");
                  }, 200);
              }
          }
      });

      // Return date picker
      $("#returnDate").datepicker({
          dateFormat: "yy-mm-dd",
          minDate: 0,
          numberOfMonths: 2
      });

      // Trip type toggle
      $('input[name="tripType"]').on('change', function () {
          if ($(this).val() === 'roundtrip') {
              $("#returnDate").prop("disabled", false);

              // Enforce min return date if departure already selected
              const departVal = $("#departDate").val();
              if (departVal) {
                  $("#returnDate").datepicker("option", "minDate", departVal);

                  // If current return < depart, reset it
                  const returnVal = $("#returnDate").val();
                  if (returnVal && returnVal < departVal) {
                      $("#returnDate").val(departVal);
                  }
              }
          } else {
              $("#returnDate").prop("disabled", true).val("");
          }
      });

      // Initial state check
      if ($('input[name="tripType"]:checked').val() !== 'roundtrip') {
          $("#returnDate").prop("disabled", true);
      }
  });

</script>

<!-- Airline Filter wise show -->
<script>
document.addEventListener("DOMContentLoaded", function () {
  const checkboxes = document.querySelectorAll(".filter-airline");
  const flights = document.querySelectorAll(".flight-result-box");

  checkboxes.forEach(cb => {
    cb.addEventListener("change", function () {
      // collect all selected airlines
      let selectedAirlines = Array.from(document.querySelectorAll(".filter-airline:checked"))
        .map(cb => cb.value);

      if (selectedAirlines.length === 0) {
        // no filter -> show all flights
        flights.forEach(f => f.style.display = "");
      } else {
        flights.forEach(f => {
          let airline = f.getAttribute("data-airline");
          if (selectedAirlines.includes(airline)) {
            f.style.display = "";
          } else {
            f.style.display = "none";
          }
        });
      }
    });
  });
});
</script>

</body>
</html>
