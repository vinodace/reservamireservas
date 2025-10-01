<!DOCTYPE html>
<html lang="en">

<head>
  <title>Fast, Flexible, and Affordable Travel</title>

<?php include("header.php"); ?>

<div class="modal fade airline-modal show" id="airline_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center text-decoration-none text-dark">
            <div class="content-center">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h2 class="airline-modal-tophding">24/7 Airline Customer Service</h2>
                    <a href="tel:<?php echo $phone_number_web4; ?>">
                        <div class="position-relative mx-auto d-table pt-4">
                            <div class="calling-main-btn">
                                <div class="calling-btn-img">
                                    <img src="assets/images/helping-team.png" alt="">
                                </div>
                                <div class="calling-btn-txt">
                                    Call Now
                                    <div class="calling-icon">
                                        <i class="fa-solid fa-phone-volume"></i>
                                    </div>
                                </div>
                                <span><?php echo $phone_number_web4; ?></span>
                            </div>
                        </div>
                    </a>
                    <div class="d-flex flex-wrap justify-content-between mt-3">
                        <p class="airline-modal-txt">*Call Waiting Time Zero</p>
                        <p class="airline-modal-txt">*24x7 Customer Help</p>
                    </div>
                    <div class="calling-box">
                        <div>
                            <a href="tel:<?php echo $phone_number_web4; ?>" class="calling-box-btn">Call Now</a>
                            <p class="calling-box-txt">
                                <strong>To Book New Flight</strong>, Make Changes or Cancel Your Existing Flight
                            </p>
                        </div>
                    </div>
                    <img src="assets/images/expedia-logo.svg" alt="" class="airline-modal-logo">
                    <a href="tel:<?php echo $phone_number_web4; ?>" class="calling-btn"><i class="fa-solid fa-phone-volume"></i> <?php echo $phone_number_web4; ?></a>
                    <p class="airline-modal-txt text-center pb-3">Click to call for 24/7 Customer Service</p>
                </div>
            </div>
        </div>    
    </div>
</div>

<div id="carouselExampleCaptions" class="carousel slide home-banner" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/banner-img-2.jpg" class="d-none d-lg-block w-100" alt="...">
      <img src="assets/images/banner-img-mobile-2.jpg" class="d-block d-lg-none w-100" alt="...">
      <div class="carousel-caption d-md-block">
        <div class="container">
          <div class="row justify-content-end">
            <div class="col-md-5">
              <h1 class="banner-hding">Your Adventure, Your Choice</h1>
              <p class="banner-prgh">Customizable flight options to suit every traveler, whether it’s a weekend break or a long expedition.</p>
              <div class="d-block d-md-none">
                <div class="d-flex align-items-center gap-4">
                  <img src="assets/images/help.png" alt="" class="banner-help-icon">
                  <div>
                    <h1 class="banner-hding">We're here to assist your booking</h1>
                    <h1 class="banner-hding text-white pt-1"><i class="fa-solid fa-phone-volume"></i> <?php echo $phone_number_web4; ?></h1>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>  
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/images/banner-img-3.jpg" class="d-none d-lg-block w-100" alt="...">
      <img src="assets/images/banner-img-mobile-3.jpg" class="d-block d-lg-none w-100" alt="...">
      <div class="carousel-caption d-md-block">
        <div class="container">
          <div class="row justify-content-end">
            <div class="col-md-5">
              <h1 class="banner-hding">Soar Higher, Spend Smarter</h1>
              <p class="banner-prgh">Find amazing deals on flights to your favorite destinations. Plan your next adventure at the perfect price!</p>
              <div class="d-block d-md-none">
                <div class="d-flex align-items-center gap-4">
                  <img src="assets/images/help.png" alt="" class="banner-help-icon">
                  <div>
                    <h1 class="banner-hding">We're here to assist your booking</h1>
                    <h1 class="banner-hding text-white pt-1"><i class="fa-solid fa-phone-volume"></i> <?php echo $phone_number_web4; ?></h1>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>  
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/images/banner-img-1.jpg" class="d-none d-lg-block w-100" alt="...">
      <img src="assets/images/banner-img-mobile-1.jpg" class="d-block d-lg-none w-100" alt="...">
      <div class="carousel-caption d-md-block">
        <div class="container">
          <div class="row justify-content-end">
            <div class="col-md-5">
              <h1 class="banner-hding">Effortless Flight Booking</h1>
              <p class="banner-prgh">Book your flights quickly and securely, with instant confirmation and peace of mind.</p>
              <div class="d-block d-md-none">
                <div class="d-flex align-items-center gap-4">
                  <img src="assets/images/help.png" alt="" class="banner-help-icon">
                  <div>
                    <h1 class="banner-hding">We're here to assist your booking</h1>
                    <h1 class="banner-hding text-white pt-1"><i class="fa-solid fa-phone-volume"></i> <?php echo $phone_number_web4; ?></h1>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>      
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<!-- Start Flight Search -->
<section class="container">
  <div class="row">
    <div class="col-md-12">
        <form id="flightForm" class="flight-searc-box" action="flight-search/"  method="GET">
          <div class="row">
            <div class="col-sm-12 mb-3">
              <!-- Trip Type -->
              <div class="form-group">
                  <label><input type="radio" class="choose-trip-type" name="tripType" value="oneway" checked> One Way</label>
                  <label><input type="radio" class="choose-trip-type" name="tripType" value="roundtrip"> Round Trip</label>
              </div>    
            </div>
            <div class="col-sm-12">
              <div class="flight-field-bg">
                <div class="row">
                  <div class="col-md">
                    <div class="row">
                      <div class="col-sm-6 col-md-6 pe-md-0">
                        <div class="form-group" id="citySection">
                          <label class="filter-lbl">Leaving From</label>
                          <input type="text" class="filter-field from_oneway1 field-right-radius-0" id="fromAirport" placeholder="From" required>
                          <!-- <input type="hidden" id="fromAirportCode" name="origin_code"> -->
                          <input type="hidden" id="fromAirportCode" name="origin" value="">    <!-- IATA Code -->
                           <input type="hidden" id="fromAirportName" name="origin_name" value="">   <!-- Full Name -->
                        </div> 
                      </div>
                      <div class="col-sm-6 col-md-6 px-md-0">
                        <div class="form-group" id="citySection">
                          <label class="filter-lbl">Going To</label>
                          <input type="text" class="filter-field to_oneway1 field-radius-0" id="toAirport" placeholder="To" required>
                          <!-- <input type="hidden" id="toAirportCode" name="destination_code"> -->
                          <input type="hidden" id="toAirportCode" name="destination" value=""> <!-- IATA Code -->
                          <input type="hidden" id="toAirportName" name="destination_name" value> <!-- Full Name -->
                        </div>
                      </div>    
                    </div>
                  </div>
                  
                  <div class="col-sm-6 col-md-2 px-md-0">
                    <div class="form-group">
                       <label class="filter-lbl">Departure Date</label>
                        <input type="text" class="filter-field field-radius-0" id="departDate" name="departure_date" placeholder="Select date" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-2 px-md-0">
                    <div class="form-group">   
                        <label class="filter-lbl">Return Date</label> 
                        <input type="text" class="filter-field field-radius-0" name="return_date" id="returnDate" placeholder="Select date">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-auto px-md-0">
                    <div class="form-group">
                      <label class="filter-lbl">Passenger & Class</label>
                      <div class="filter-field field-left-radius-0" id="passengerClassDisplay">1 Adult - Economy</div>
                      <input type="hidden" name="passenger" id="passenger" value="1 Adult - Economy"> 

                      <div class="dropdown-panel" id="passengerDropdown">
                        <!-- Passenger Counters -->
                        <div class="traveller-row">
                            <input type="hidden" name="adults" id="adults" value="1">
                            <span>Adults <span>(12y +)</span></span>
                            <div>
                                <button type="button" class="count-btn" onclick="changeCount('adult', -1)">-</button>
                                <span class="passenger-count-output" id="adultCount">1</span>
                                <button type="button" class="count-btn" onclick="changeCount('adult', 1)">+</button>
                            </div>
                        </div>
                        <div class="traveller-row">
                            <input type="hidden" name="children" id="children" value="0">
                            <span>Children <span>(2y - 12y)</span></span>
                            <div>
                                <button type="button" class="count-btn" onclick="changeCount('child', -1)">-</button>
                                <span class="passenger-count-output" id="childCount">0</span>
                                <button type="button" class="count-btn" onclick="changeCount('child', 1)">+</button>
                            </div>
                        </div>
                        <div class="traveller-row">
                            <input type="hidden" name="infants" id="infants" value="0">
                            <span>Infants <span>(Below 2y)</span></span>
                            <div>
                                <button type="button" class="count-btn" onclick="changeCount('infant', -1)">-</button>
                                <span class="passenger-count-output" id="infantCount">0</span>
                                <button type="button" class="count-btn" onclick="changeCount('infant', 1)">+</button>
                            </div>
                        </div>

                        <!-- Class Selection -->
                        <div class="form-group mt-3">
                            <label class="travel-class-lbl">Choose Travel Class</label>
                            <select class="form-control" id="travelClass">
                                <option value="Economy">Economy</option>
                                <option value="Business">Business</option>
                                <option value="First">First Class</option>
                            </select>
                            <input type="hidden" name="travel_class" id="cabin_class" value="ECONOMY">
                        </div>

                        <!-- Confirm Button -->
                        <div class="mt-3 text-end">
                            <button type="button" class="btn btn-primary btn-sm" onclick="confirmPassengers()">Confirm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-auto">
                    <div class="d-flex justify-content-md-center pe-md-3">
                      <button type="submit" name="submit" class="flight-search-btn mx-auto mx-md-0 d-table"><i class="fa-solid fa-magnifying-glass"></i> Search Flights</button>
                    </div>  
                  </div>
                </div>
              </div>
            </div>  
          </div>
          
        </form>

        <script>
            tripTypeRadios.forEach(radio => {
                radio.addEventListener('change', () => {
                    if (radio.value === 'roundtrip') {
                        returnDateInput.readOnly = false; 
                    } else {
                        returnDateInput.readOnly = true;  
                        returnDateInput.value = '';       
                    }
                });
            });

            // Initial state
            if (document.querySelector('input[name="tripType"]:checked').value !== 'roundtrip') {
                returnDateInput.readOnly = true;
            }
            
        </script>
    </div>
  </div>
</section>
<!-- End Flight Search -->

<section class="pt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="service_area">
          <img src="assets/images/service-img-1.jpg" alt="">
        </div>
        <div class="service_area">
          <div>
            <div class="service-icon"><i class="fa-solid fa-medal"></i></div>
            <h3>Your Trusted Travel Agency</h3>
            <p>Experience seamless bookings, exclusive deals, and personalized service for every journey.</p>
          </div>  
        </div>
      </div>
      <div class="col-md-4">
        <div class="row g-0">
          <div class="service_area col-12">
            <div>
              <div class="service-icon"><i class="fa-solid fa-route"></i></div>
              <h3>Safe Travels, Every Time</h3>
              <p>Enjoy a secure and worry-free journey with trusted service at every step.</p>
            </div> 
          </div>
          <div class="service_area col-12 order-first order-md-last">
            <img src="assets/images/service-img-2.jpg" alt="">
          </div>
        </div>  
      </div>
      <div class="col-md-4">
        <div class="service_area">
          <img src="assets/images/service-img-3.jpg" alt="">
        </div>
        <div class="service_area">
          <div>
            <div class="service-icon"><i class="fa-solid fa-earth-asia"></i></div>
            <h3>Explore World-Class Destinations</h3>
            <p>Discover the most stunning places across the globe, handpicked for unforgettable experiences.</p>
          </div> 
        </div>
      </div>
    </div>
  </div>
</section>

<section class="position-relative">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="shape-1">
          <img src="assets/images/left-shape.png" alt="">
        </div>
        <h5 class="main-title">Plan Your Perfect Getaway</h5>
        <h2 class="main-hding">Explore Without Limits</h2>
        <p class="main-prgh mb-4">Turn your travel dreams into reality with curated destinations, flexible flight options, and unbeatable deals. Whether it’s a relaxing escape or a thrilling adventure, we make planning your next trip effortless and exciting.</p>

        <ul class="travel-ftr">
          <li>
            <div class="travel-ftr-icon">
              <i class="fa-solid fa-plane-departure"></i>
            </div>
            <div>
              <h3 class="travel-ftr-hding">Flexible Flight Options</h3>
              <p class="travel-ftr-content">Choose from a wide range of airlines and routes tailored to your schedule.</p>
            </div>
          </li>
          <li>
            <div class="travel-ftr-icon">
              <i class="fa-solid fa-earth-americas"></i>
            </div>
            <div>
              <h3 class="travel-ftr-hding">Top Destinations</h3>
              <p class="travel-ftr-content">Explore world-class places handpicked for unforgettable experiences.</p>
            </div>
          </li>
          <li>
            <div class="travel-ftr-icon">
              <i class="fa-solid fa-ticket"></i>
            </div>
            <div>
              <h3 class="travel-ftr-hding">Safe & Secure Booking</h3>
              <p class="travel-ftr-content">Enjoy a worry-free booking process with instant confirmation.</p>
            </div>
          </li>
        </ul>
      </div>
      <div class="col-lg-6">
        <div class="position-relative h-100">
          <img src="assets/images/shape-2.png" alt="" class="shape-2">
          <img src="assets/images/world-explore.jpg" alt="" class="img-fluid travel-right-lgimg">
          <img src="assets/images/plan-inside.jpg" alt="" class="travel-right-xsimg">
        </div>
      </div>
    </div>
  </div>
</section>

<section class="pt-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-4">
        <div class="service_area">
          <img src="assets/images/tour-img-1.jpg" alt="">
        </div>
      </div>
      <div class="col-md-4">
        <h5 class="main-title text-center">Most Popular Tour</h5>
        <h2 class="main-hding text-center">Discover Our Most Popular Tours</h2>
        <p class="main-prgh text-center mb-4">From breathtaking landmarks to hidden gems, our top-rated tours are crafted to give you unforgettable memories. Explore the favorites loved by travelers worldwide and find the perfect experience for your next adventure.</p>
      </div>
      <div class="col-md-4">
        <div class="service_area">
          <img src="assets/images/tour-img-2.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="flight-result-box " data-airline="ai">
          <div class="row">
            <div class="col-md-9">
              <div class="row align-items-center mb-3">
                <div class="col-md-3">
                    <div class="d-flex d-md-block align-items-center gap-3 mb-2 mb-md-0">
                        <img src="https://static.tripcdn.com/packages/flight/airline-logo/latest/airline_logo/3x/ai.webp" width="50" alt="AI">
                        <p class="flight-logo-name">Air India</p>
                    </div>
                </div>
                <div class="col">
                    <div class="row text-center">
                        <div class="col-4">
                            <h5 class="flight-time">09:00 AM</h5>
                            <p class="flight-location">DEL</p>
                        </div>
                        <div class="col-4">
                            <div class="flight-result-duration">
                              2h 30m 
                             <div class="flight-duration-line"></div>
                                  <small class="text-muted">Non-stop</small>
                          </div>
                        </div>
                        <div class="col-4">
                            <h5 class="flight-time">11:30 AM</h5>
                            <p class="flight-location">GOI</p>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-lg-flex flex-column justify-content-center text-center">
              <div class="d-flex d-mb-block flex-column justify-content-between justify-content-md-center text-md-center">
                  <div>
                      <a href="#" class="flight-price">
                          $ 58.90                                
                      </a>
                  </div>
                  <a href="booking.php" class="common-btn mt-0">Select</a>
              </div>
              <a href="javascript:void(0)" class="main-prgh text-center d-block text-primary text-decoration-none pt-1" data-bs-toggle="modal" data-bs-target="#stopsModal1">Itinerary</a>
            </div>
          </div>
        </div>
        <div class="flight-result-box " data-airline="ai">
          <div class="row">
            <div class="col-md-9">
              <div class="row align-items-center mb-3">
                <div class="col-md-3">
                    <div class="d-flex d-md-block align-items-center gap-3 mb-2 mb-md-0">
                        <img src="https://static.tripcdn.com/packages/flight/airline-logo/latest/airline_logo/3x/ai.webp" width="50" alt="AI">
                        <p class="flight-logo-name">Air India</p>
                    </div>
                </div>
                <div class="col">
                    <div class="row text-center">
                        <div class="col-4">
                            <h5 class="flight-time">09:00 AM</h5>
                            <p class="flight-location">DEL</p>
                        </div>
                        <div class="col-4">
                            <div class="flight-result-duration">
                              2h 30m 
                             <div class="flight-duration-line"></div>
                                  <small class="text-muted">Non-stop</small>
                          </div>
                        </div>
                        <div class="col-4">
                            <h5 class="flight-time">11:30 AM</h5>
                            <p class="flight-location">GOI</p>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-lg-flex flex-column justify-content-center text-center">
              <div class="d-flex d-mb-block flex-column justify-content-between justify-content-md-center text-md-center">
                  <div>
                      <a href="#" class="flight-price">
                          $ 58.90                                
                      </a>
                  </div>
                  <a href="booking.php" class="common-btn mt-0">Select</a>
              </div>
              <a href="javascript:void(0)" class="main-prgh text-center d-block text-primary text-decoration-none pt-1" data-bs-toggle="modal" data-bs-target="#stopsModal1">Itinerary</a>
            </div>
          </div>
        </div>
        <div class="flight-result-box " data-airline="ai">
          <div class="row">
            <div class="col-md-9">
              <div class="row align-items-center mb-3">
                <div class="col-md-3">
                    <div class="d-flex d-md-block align-items-center gap-3 mb-2 mb-md-0">
                        <img src="https://static.tripcdn.com/packages/flight/airline-logo/latest/airline_logo/3x/ai.webp" width="50" alt="AI">
                        <p class="flight-logo-name">Air India</p>
                    </div>
                </div>
                <div class="col">
                    <div class="row text-center">
                        <div class="col-4">
                            <h5 class="flight-time">09:00 AM</h5>
                            <p class="flight-location">DEL</p>
                        </div>
                        <div class="col-4">
                            <div class="flight-result-duration">
                              2h 30m 
                             <div class="flight-duration-line"></div>
                                  <small class="text-muted">Non-stop</small>
                          </div>
                        </div>
                        <div class="col-4">
                            <h5 class="flight-time">11:30 AM</h5>
                            <p class="flight-location">GOI</p>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-lg-flex flex-column justify-content-center text-center">
              <div class="d-flex d-mb-block flex-column justify-content-between justify-content-md-center text-md-center">
                  <div>
                      <a href="#" class="flight-price">
                          $ 58.90                                
                      </a>
                  </div>
                  <a href="booking.php" class="common-btn mt-0">Select</a>
              </div>
              <a href="javascript:void(0)" class="main-prgh text-center d-block text-primary text-decoration-none pt-1" data-bs-toggle="modal" data-bs-target="#stopsModal1">Itinerary</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="assets/images/offer-card-1.jpg" alt="offer" class="img-fluid offercard-img">
      </div>
      <div class="col-md-6">
        <img src="assets/images/offer-card-2.jpg" alt="offer" class="img-fluid offercard-img">
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-9 col-lg-8 pb-4 position-relative">
        <img src="assets/images/search-airplane.png" alt="" class="plan-shape-1">
        <img src="assets/images/search-airplane.png" alt="" class="plan-shape-2">
        <h5 class="main-title text-center">Travel Spots Around the Globe</h5>
        <h2 class="main-hding text-center">Explore Iconic Destinations Worldwide</h2>
        <p class="main-prgh text-center mb-4">Journey to the world’s most sought-after destinations with ease. From vibrant cities to serene escapes, our curated travel options ensure you experience the best each place has to offer—making every trip truly unforgettable.</p>
      </div>
      <div class="w-100"></div>
      <div class="col-sm-6 col-md-4 col-xl-3">
        <div class="tt_dest-box">
          <img src="assets/images/paris.jpg" alt="">
          <h4 class="tt_dest-hding">Paris</h4>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-xl-3">
        <div class="tt_dest-box">
          <img src="assets/images/australia.jpg" alt="">
          <h4 class="tt_dest-hding">Australia</h4>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-xl-3">
        <div class="tt_dest-box">
          <img src="assets/images/bangkok.jpg" alt="">
          <h4 class="tt_dest-hding">Bangkok</h4>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-xl-3">
        <div class="tt_dest-box">
          <img src="assets/images/sydney.jpg" alt="">
          <h4 class="tt_dest-hding">Sydney</h4>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-3">
        <div class="secure-card-1">
          <img src="assets/images/security.png" alt="secure">
          <p class="secure-card-text">Safe & Secure Booking</p>
        </div>
      </div>
      <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-3">
        <div class="secure-card-2">
          <img src="assets/images/plane.png" alt="secure">
          <p class="secure-card-text">Flexible Flight</p>
        </div>
      </div>
      <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-3">
        <div class="secure-card-3">
          <img src="assets/images/best-price.png" alt="secure">
          <p class="secure-card-text">Best Price Guarantee</p>
        </div>
      </div>
      <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-3">
        <div class="secure-card-4">
          <img src="assets/images/help.png" alt="secure">
          <p class="secure-card-text">Any Time Customer Help</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="main-hding text-center pb-5">Frequently Asked Questions (FAQs)</h2>
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                How do I search for the best travel deals?
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Simply enter your destination, travel dates, and number of travelers. Our system will instantly compare prices across airlines to give you the best deals.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Can I book tours along with flights?
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Yes, you can bundle flights with holiday packages, or guided tours to save more and enjoy a complete travel experience.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Will I get instant confirmation after booking?
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Yes, once your payment is successful, you will receive an email with your e-ticket or booking voucher instantly.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                What payment methods are supported?
              </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">We accept credit/debit cards for fast and secure payments.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                Can I reschedule or cancel my booking?
              </button>
            </h2>
            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Yes, changes and cancellations are possible depending on airline policies. Fees may apply as per fare rules.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingSix">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                How do I track my flight search details?
              </button>
            </h2>
            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">You can log in to your account using your my activites can see your details.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingSeven">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                Can I add extras like baggage, meals, or seat selection?
              </button>
            </h2>
            <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Yes, after booking you can add extras such as baggage, meals, or seat upgrades directly from the airline “Manage Booking” section.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingEight">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
                What documents do I need while traveling?
              </button>
            </h2>
            <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">For domestic travel, carry a valid government-issued photo ID and your e-ticket. For international trips, a valid passport, visa, and travel insurance may be required.</div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<?php include("footer.php") ?>

<!-- Flight Price offer card api -->

<script>
  const container = document.getElementById("flight-offer-cards-container");

  // Show loader before fetch
  container.innerHTML = `<div id="loader" style="text-align:center; padding:20px;" class="d-flex justify-content-center gap-3 align-items-center">
    <i class="fa fa-spinner fa-spin fa-2x"></i> Loading flights...
  </div>`;

  // Get today's date + 7 days
  let today = new Date();
  today.setDate(today.getDate() + 7); // 7 days ahead

  let year = today.getFullYear();
  let month = String(today.getMonth() + 1).padStart(2, "0");
  let day = String(today.getDate()).padStart(2, "0");

  let futureDate = `${year}-${month}-${day}`;

  // Fetch with dynamic future date
  fetch(`flight-search/get-flight-offers.php?origin=NYC&destination=LON&date=${futureDate}&adults=1`)
    .then(res => res.json())
    .then(data => {
      console.log("API Response:", data); // Debugging
      container.innerHTML = ""; // clear loader

      if (!data.data || data.data.length === 0) {
        container.innerHTML = `<p style="text-align:center; padding:20px;">❌ No flights found for your search.</p>`;
        return;
      }

      let cardLimit = 9;
      data.data.slice(0, cardLimit).forEach(flight => {
        let segment = flight.itineraries[0].segments[0];
        let lastSegment = flight.itineraries[0].segments.slice(-1)[0];

        let originCode = segment.departure.iataCode;
        let destinationCode = lastSegment.arrival.iataCode;

        let departureDate = new Date(segment.departure.at).toLocaleDateString();
        let departureTime = new Date(segment.departure.at).toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" });

        let arrivalDate = new Date(lastSegment.arrival.at).toLocaleDateString();
        let arrivalTime = new Date(lastSegment.arrival.at).toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" });

        let departureTerminal = segment.departure.terminal || "—";
        let arrivalTerminal = lastSegment.arrival.terminal || "—";

        let carrier = segment.carrierCode;
        let flightNumber = segment.number;

        let duration = flight.itineraries[0].duration
          .replace("PT", "")
          .replace("H", "h ")
          .replace("M", "m")
          .toLowerCase()
          .trim();

        let symbols = {
        "USD": "$",
        "EUR": "€",
        "GBP": "£",
        "INR": "₹",
        "AED": "د.إ",
        "JPY": "¥",
        "CNY": "¥",
        "CAD": "C$",
        "AUD": "A$",
        "CHF": "CHF"
      };

      let price = flight.price.total;
      let currency = flight.price.currency;
      let symbol = symbols[currency] || currency;

        let logoUrl = `https://static.tripcdn.com/packages/flight/airline-logo/latest/airline_logo/3x/${carrier.toLowerCase()}.webp`;

        container.innerHTML += `
          <div class="col-md-4">
            <div class="disc_card">
              <div class="d-flex justify-content-between mb-2">
                <h2 class="main-subhding pt-0 text-primary">${symbol}${price}</h2>
                <a href="store-offer.php?offerId=${flight.id}&source=card" class="disc_btn">Book Now</a>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="flight_route_web2">${originCode}</h4>
                  <ul class="disc-flight_details_web2">
                    <li><i class="fa-solid fa-calendar-days"></i> ${departureDate}</li>
                    <li><i class="fa-solid fa-clock"></i> ${departureTime}</li>
                    <li><i class="fa-solid fa-archway"></i> Terminal: ${departureTerminal}</li>
                  </ul>
                </div>
                <div>
                  <img src="images/airplane.png" class="disc_route_img">
                  <p class="disc-flight_num_web2 pt-1">${duration}</p>
                </div>  
                <div>
                  <h4 class="flight_route_web2">${destinationCode}</h4>
                  <ul class="disc-flight_details_web2">
                    <li><i class="fa-solid fa-calendar-days"></i> ${arrivalDate}</li>
                    <li><i class="fa-solid fa-clock"></i> ${arrivalTime}</li>
                    <li><i class="fa-solid fa-archway"></i> Terminal: ${arrivalTerminal}</li>
                  </ul>
                </div>
              </div>
              <img src="${logoUrl}" alt="${carrier}" class="disc_flight_logo">
              <p class="disc-flight_num_web2">${carrier} ${flightNumber}</p>
            </div>
          </div>
        `;
      });
    })
    .catch(err => {
      console.error("❌ Fetch error:", err);
      container.innerHTML = `<p style="text-align:center; padding:20px; color:red;">⚠️ Failed to load flights. Please try again later.</p>`;
    });
</script>




<!-- show total passenger value and fetch value in another page  -->
<script>
  const displayBox = document.getElementById('passengerClassDisplay');
  const dropdownPanel = document.getElementById('passengerDropdown');
  const counts = { adult: 1, child: 0, infant: 0 };

  // Toggle dropdown
  displayBox.addEventListener('click', () => {
      dropdownPanel.style.display = dropdownPanel.style.display === 'block' ? 'none' : 'block';
  });

  // Update count
  function changeCount(type, delta) {
      if (counts[type] + delta >= 0) {
          counts[type] += delta;
          document.getElementById(type + 'Count').textContent = counts[type];
      }
  }

  // Build summary + update hidden fields
  function updateDisplay() {
      const travelClass = document.getElementById('travelClass').value;
      const totalPassengers = counts.adult + counts.child + counts.infant;
      const passengerLabel = totalPassengers === 1 ? 'Passenger' : 'Passengers';

      // Display box
      displayBox.textContent = `${totalPassengers} ${passengerLabel} - ${travelClass}`;

      // Hidden inputs
      document.getElementById('adults').value      = counts.adult;
      document.getElementById('children').value    = counts.child;
      document.getElementById('infants').value     = counts.infant;
      document.getElementById('cabin_class').value = travelClass;
      document.getElementById('passenger').value = 
          `${counts.adult} Adult${counts.adult > 1 ? 's' : ''}`
          + (counts.child > 0 ? `, ${counts.child} Child${counts.child > 1 ? 'ren' : ''}` : '')
          + (counts.infant > 0 ? `, ${counts.infant} Infant${counts.infant > 1 ? 's' : ''}` : '')
          + ` - ${travelClass}`;
  }

  // Confirm button action
  function confirmPassengers() {
      updateDisplay();
      dropdownPanel.style.display = 'none';
      buildTravellerRows();
  }

  // Build traveller rows dynamically
  function buildTravellerRows() {
      const tbody = document.querySelector("#traveller-table tbody");
      if (!tbody) return;

      tbody.innerHTML = "";
      for (let i = 1; i <= counts.adult; i++) tbody.appendChild(createTravellerRow(`Adult ${i}`));
      for (let i = 1; i <= counts.child; i++) tbody.appendChild(createTravellerRow(`Child ${i}`));
      for (let i = 1; i <= counts.infant; i++) tbody.appendChild(createTravellerRow(`Infant ${i}`));
  }

  // Create single traveller row
  function createTravellerRow(label) {
      const tr = document.createElement("tr");
      tr.innerHTML = `
          <td>${label}</td>
          <td><label>First Name</label><input type="text" name="first-name[]" required></td>
          <td><label>Middle Name</label><input type="text" name="middle-name[]"></td>
          <td><label>Last Name</label><input type="text" name="last-name[]" required></td>
          <td><label>Gender</label>
              <select name="gender[]"><option>Male</option><option>Female</option></select>
          </td>
          <td><label>DOB</label><input type="text" name="dob[]" class="dob_datepicker" required></td>
      `;
      return tr;
  }

  // Close dropdown if clicking outside
  document.addEventListener('click', function(e) {
      if (!e.target.closest('#passengerDropdown') && !e.target.closest('#passengerClassDisplay')) {
          dropdownPanel.style.display = 'none';
      }
  });

  // --- KEY FIX ---
  // Update hidden fields before any form submission
  document.querySelector("form").addEventListener("submit", function() {
      updateDisplay();
  });

document.addEventListener('DOMContentLoaded', () => {
    // Preserve initial values from hidden inputs (useful when coming back from flight-result.php)
    counts.adult = parseInt(document.getElementById('adults').value) || 1;
    counts.child = parseInt(document.getElementById('children').value) || 0;
    counts.infant = parseInt(document.getElementById('infants').value) || 0;

    // Initialize display
    updateDisplay();

    // Attach confirm button
    document.getElementById('confirmPassengerBtn').addEventListener('click', confirmPassengers);

    // Ensure form submission updates hidden fields
    document.querySelector("form").addEventListener("submit", function() {
        updateDisplay();
    });
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
          //fetch(`https://test.api.amadeus.com/v1/reference-data/airlines?subType=AIRPORT,CITY&keyword=${request.term}&page[limit]=20`, {
          fetch(`https://test.api.amadeus.com/v1/reference-data/locations?subType=AIRPORT&keyword=${request.term}&page[limit]=20`, {
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


<script>
  $(function() {
      // Departure date picker
      $("#departDate").datepicker({
          dateFormat: "yy-mm-dd",
          minDate: 0,
          numberOfMonths: 2,
          onSelect: function(selectedDate) {
              // Set minimum return date
              $("#returnDate").datepicker("option", "minDate", selectedDate);

              // If round trip, open the return date calendar automatically
              if ($('input[name="tripType"]:checked').val() === 'roundtrip') {
                  setTimeout(function() {
                      $("#returnDate").datepicker("show");
                  }, 200); // small delay so it feels smooth
              }
          }
      });

      // Return date picker
      $("#returnDate").datepicker({
          dateFormat: "yy-mm-dd",
          minDate: 0,
          numberOfMonths: 2
      });

      // Trip type change handling
      $('input[name="tripType"]').on('change', function() {
          if ($(this).val() === 'roundtrip') {
              $("#returnDate").prop('disabled', false);
          } else {
              $("#returnDate").prop('disabled', true).val('');
          }
      });

      // Initial disable if not round trip
      if ($('input[name="tripType"]:checked').val() !== 'roundtrip') {
          $("#returnDate").prop('disabled', true);
      }
  });

</script>


<script>
    window.addEventListener('load', () => {
    const modal = new bootstrap.Modal(document.getElementById('airline_modal'));
    modal.show();
  });
</script>

</body>
</html>
 

