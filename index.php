<?php
session_start();
?>
<?php 
  include ("lang-change.php");
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
  <title>Fast, Flexible, and Affordable Travel</title>

<?php include("header.php"); ?>

<!-- <div class="modal fade airline-modal show" id="airline_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center text-decoration-none text-dark">
            <div class="content-center">
                <div class="modal-body" data-lang="en">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h2 class="airline-modal-tophding">24/7 Airline Customer Service</h2>
                    <a href="" class="dynamic-phone-link">
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
                                <span class="dynamic-phone"></span>
                            </div>
                        </div>
                    </a>
                    <div class="d-flex flex-wrap justify-content-between mt-3">
                        <p class="airline-modal-txt">*Call Waiting Time Zero</p>
                        <p class="airline-modal-txt">*24x7 Customer Help</p>
                    </div>
                    <div class="calling-box">
                        <div>
                            <a href="" class="calling-box-btn dynamic-phone-link">Call Now</a>
                            <p class="calling-box-txt">
                                <strong>To Book New Flight</strong>, Make Changes or Cancel Your Existing Flight
                            </p>
                        </div>
                    </div>
                    <img src="assets/images/expedia-logo.svg" alt="" class="airline-modal-logo">
                    <a href="" class="calling-btn dynamic-phone-link"><i class="fa-solid fa-phone-volume"></i> <span class="dynamic-phone"></span></a>
                    <p class="airline-modal-txt text-center pb-3">Click to call for 24/7 Customer Service</p>
                </div>

                <div class="modal-body" data-lang="es">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h2 class="airline-modal-tophding">Servicio de atención al cliente de la aerolínea 24/7</h2>
                    <a href="#" class="dynamic-phone-link">
                        <div class="position-relative mx-auto d-table pt-4">
                            <div class="calling-main-btn">
                                <div class="calling-btn-img">
                                    <img src="assets/images/helping-team.png" alt="">
                                </div>
                                <div class="calling-btn-txt">
                                    Llama ahora
                                    <div class="calling-icon">
                                        <i class="fa-solid fa-phone-volume"></i>
                                    </div>
                                </div>
                                <span class="dynamic-phone"></span>
                            </div>
                        </div>
                    </a>
                    <div class="d-flex flex-wrap justify-content-between mt-3">
                        <p class="airline-modal-txt">*Tiempo de espera para llamadas: cero</p>
                        <p class="airline-modal-txt">*Atención al cliente 24/7</p>
                    </div>
                    <div class="calling-box">
                        <div>
                            <a href="" class="calling-box-btn dynamic-phone-link">Llama ahora</a>
                            <p class="calling-box-txt">
                                <strong>Para reservar un nuevo vuelo</strong>, Realice cambios o cancele su vuelo actual
                            </p>
                        </div>
                    </div>
                    <img src="assets/images/expedia-logo.svg" alt="" class="airline-modal-logo">
                    <a href="" class="calling-btn dynamic-phone-link"><i class="fa-solid fa-phone-volume"></i> <span class="dynamic-phone"></span></a>
                    <p class="airline-modal-txt text-center pb-3">Haga clic para llamar al servicio de atención al cliente 24/7</p>
                </div>
            </div>
        </div>    
    </div>
</div> -->

<div class="modal fade airline-modal show" id="airline_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center text-decoration-none text-dark">
            <div class="content-center">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    <!-- <h2 class="airline-modal-tophding" data-lang="en">24/7 Airline Customer Service</h2>
                    <h2 class="airline-modal-tophding" data-lang="es">Servicio de atención al cliente de la aerolínea 24/7</h2> -->

                    <a href="tel:<?php echo $phone_number_us; ?>">
                        <div class="position-relative mx-auto d-table pt-4">
                            <div class="calling-main-btn">
                                <div class="calling-btn-img">
                                    <img src="<?= $root_path ?>assets/images/helping-team.png" alt="">
                                </div>
                                <div class="calling-btn-txt">
                                    <span data-lang="en">Call Now </span>
                                    <span data-lang="es">Llama ahora</span>
                                    <div class="calling-icon">
                                        <i class="fa-solid fa-phone-volume"></i>
                                    </div>
                                </div>
                                <span><?php echo $phone_number_us; ?></span>
                            </div>
                        </div>
                    </a>
                    <div class="d-flex flex-wrap justify-content-between mt-3" >
                        <p class="airline-modal-txt" data-lang="en">*Call Waiting Time Zero</p>
                        <p class="airline-modal-txt" data-lang="es">*Tiempo de espera para llamadas: cero</p>

                        <p class="airline-modal-txt" data-lang="en">*24x7 Customer Help</p>
                        <p class="airline-modal-txt" data-lang="es">*Atención al cliente 24/7</p>
                    </div>
                    <div class="calling-box">
                        <div>
                            <a href="tel:<?php echo $phone_number_us; ?>" class="calling-box-btn">
                              <span data-lang="en">Call Now</span>
                              <span data-lang="es">Llama ahora</span>
                            </a>

                            <p class="calling-box-txt" data-lang="en">
                                <strong>To Book New Flight</strong>, Make Changes or Cancel Your Existing Flight
                            </p>
                            <p class="calling-box-txt" data-lang="es">
                                <strong>Para reservar un nuevo vuelo</strong>, Realice cambios o cancele su vuelo actual
                            </p>
                        </div>
                    </div>
                    <img src="<?= $root_path ?>assets/images/expedia-logo.svg" alt="" class="airline-modal-logo">
                    <h2 class="main-subhding text-center" data-lang="en">FLIGHT HELP DESK</h2>
                    <h2 class="main-subhding text-center" data-lang="es">MESA DE ATENCIÓN AL PASAJERO</h2>

                    <p class="airline-modal-txt text-center pb-0" data-lang="en">We're here to assist your booking</p>
                    <p class="airline-modal-txt text-center pb-0" data-lang="es">Estamos aquí para ayudarte con tu reserva.</p>

                    <a href="tel:<?php echo $phone_number_us; ?>" class="calling-btn-flag">
                      <div class="flag-img">
                        <img src="<?= $root_path ?>assets/images/us-lang.png" alt="us">
                      </div>
                      <span><?php echo $phone_number_us; ?></span>
                    </a>
                    <a href="tel:<?php echo $phone_number_uk; ?>" class="calling-btn-flag">
                      <div class="flag-img">
                        <img src="<?= $root_path ?>assets/images/uk-lang.png" alt="us">
                      </div>
                      <span><?php echo $phone_number_uk; ?></span>
                    </a>
                    <p class="main-prgh text-center pb-3" data-lang="en">Click to call for 24/7 Customer Service</p>
                    <p class="main-prgh text-center pb-3" data-lang="es">Haga clic para llamar al servicio de atención al cliente 24/7</p>
                </div>
            </div>
        </div>    
    </div>
</div>

<div id="carouselExampleCaptions" class="carousel slide home-banner" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?= $root_path ?>assets/images/banner-img-2.jpg" class="d-none d-lg-block w-100" alt="...">
      <img src="<?= $root_path ?>assets/images/banner-img-mobile-2.jpg" class="d-block d-lg-none w-100" alt="...">
      <div class="carousel-caption d-md-block">
        <div class="container">
          <div class="row justify-content-end">
            <div class="col-md-5">
              <h1 class="banner-hding" data-lang="en" >Your Adventure, Your Choice</h1>
              <p class="banner-prgh"  data-lang="en">Customizable flight options to suit every traveler, whether it’s a weekend break or a long expedition.</p>

              <h1 class="banner-hding" data-lang="es">Tu aventura, tu decisión</h1>
              <p class="banner-prgh" data-lang="es">Opciones de vuelo personalizables para adaptarse a las necesidades de cada viajero, ya sea un fin de semana de descanso o una larga expedición.</p>

              <div class="d-block d-md-none">
                <div class="d-flex align-items-center gap-4">
                  <img src="<?= $root_path ?>assets/images/help.png" alt="" class="banner-help-icon">
                  <div>
                    <h1 class="banner-hding"  data-lang="en">We're here to assist your booking</h1>

                    <h1 class="banner-hding" data-lang="es">Estamos aquí para ayudarle con su reserva.</h1>
                    <h1 class="banner-hding text-white pt-1"><i class="fa-solid fa-phone-volume"></i> <span class="dynamic-phone"></span></h1>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>  
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?= $root_path ?>assets/images/banner-img-3.jpg" class="d-none d-lg-block w-100" alt="...">
      <img src="<?= $root_path ?>assets/images/banner-img-mobile-3.jpg" class="d-block d-lg-none w-100" alt="...">
      <div class="carousel-caption d-md-block">
        <div class="container">
          <div class="row justify-content-end">
            <div class="col-md-5">
              <h1 class="banner-hding" data-lang="en">Soar Higher, Spend Smarter</h1>
              <p class="banner-prgh" data-lang="en">Find amazing deals on flights to your favorite destinations. Plan your next adventure at the perfect price!</p>

              <h1 class="banner-hding" data-lang="es">Llegue más lejos, gaste con inteligencia</h1>
              <p class="banner-prgh" data-lang="es">Encuentra increíbles ofertas en vuelos a tus destinos favoritos. ¡Planifica tu próxima aventura al mejor precio!</p>

              <div class="d-block d-md-none">
                <div class="d-flex align-items-center gap-4">
                  <img src="<?= $root_path ?>assets/images/help.png" alt="" class="banner-help-icon">
                  <div>
                    <h1 class="banner-hding" data-lang="en">We're here to assist your booking</h1>

                    <h1 class="banner-hding" data-lang="es">Estamos aquí para ayudarle con su reserva.</h1>
                    <h1 class="banner-hding text-white pt-1"><i class="fa-solid fa-phone-volume"></i> <span class="dynamic-phone"></span></h1>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>  
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?= $root_path ?>assets/images/banner-img-1.jpg" class="d-none d-lg-block w-100" alt="...">
      <img src="<?= $root_path ?>assets/images/banner-img-mobile-1.jpg" class="d-block d-lg-none w-100" alt="...">
      <div class="carousel-caption d-md-block">
        <div class="container">
          <div class="row justify-content-end">
            <div class="col-md-5">
              <h1 class="banner-hding" data-lang="en">Effortless Flight Booking</h1>
              <p class="banner-prgh" data-lang="en">Book your flights quickly and securely, with instant confirmation and peace of mind.</p>

              <h1 class="banner-hding" data-lang="es">Reserva de vuelos sin complicaciones</h1>
              <p class="banner-prgh" data-lang="es">Reserva tus vuelos de forma rápida y segura, con confirmación instantánea y la tranquilidad que mereces.</p>

              <div class="d-block d-md-none">
                <div class="d-flex align-items-center gap-4">
                  <img src="<?= $root_path ?>assets/images/help.png" alt="" class="banner-help-icon">
                  <div>
                    <h1 class="banner-hding" data-lang="en">We're here to assist your booking</h1>

                    <h1 class="banner-hding" data-lang="es">Estamos aquí para ayudarle con su reserva.</h1>
                    <h1 class="banner-hding text-white pt-1"><i class="fa-solid fa-phone-volume"></i> <span class="dynamic-phone"></span></h1>
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
                  <label><input type="radio" class="choose-trip-type" name="tripType" value="oneway" checked> 
                   <span data-lang="en"> One Way</span>
                   <span data-lang="es">De una sola mano</span>
                </label>
                  <label><input type="radio" class="choose-trip-type" name="tripType" value="roundtrip"> 
                    <span data-lang="en">Round Trip</span>
                    <span data-lang="es">Ida y vuelta</span>
                </label>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="flight-field-bg">
                <div class="row">
                  <div class="col-md">
                    <div class="row">
                      <div class="col-sm-6 col-md-6 pe-md-0">
                        <div class="form-group" id="citySection">
                          <label class="filter-lbl" data-lang="en">Leaving From</label>
                          <label class="filter-lbl" data-lang="es">Partiendo de</label>
                          <input type="text" class="filter-field from_oneway1 field-right-radius-0" id="fromAirport" placeholder="From" required>
                          <!-- <input type="hidden" id="fromAirportCode" name="origin_code"> -->
                          <input type="hidden" id="fromAirportCode" name="origin" value="">    <!-- IATA Code -->
                           <input type="hidden" id="fromAirportName" name="origin_name" value="">   <!-- Full Name -->
                        </div> 
                      </div>
                      <div class="col-sm-6 col-md-6 px-md-0">
                        <div class="form-group" id="citySection">
                          <label class="filter-lbl" data-lang="en">Going To</label>
                          <label class="filter-lbl" data-lang="es">Ir a</label>
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
                       <label class="filter-lbl" data-lang="en">Departure Date</label>
                       <label class="filter-lbl" data-lang="es">Fecha de salida</label>
                        <input type="text" class="filter-field field-radius-0" id="departDate" name="departure_date" placeholder="Select date" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-2 px-md-0">
                    <div class="form-group">   
                        <label class="filter-lbl" data-lang="en">Return Date</label> 
                        <label class="filter-lbl" data-lang="es">Fecha de regreso</label> 
                        <input type="text" class="filter-field field-radius-0" name="return_date" id="returnDate" placeholder="Select date">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-auto px-md-0">
                    <div class="form-group">
                      <label class="filter-lbl" data-lang="en">Passenger & Class</label>
                      <label class="filter-lbl" data-lang="es">Pasajera y clase</label>
                      <div class="filter-field field-left-radius-0" id="passengerClassDisplay" >
                        <span data-lang="en">1 Adult - Economy</span>
                        <span data-lang="es">1 adulto - Clase económica</span>
                      </div>
                      <input type="hidden" name="passenger" id="passenger" value="1 Adult - Economy"> 

                      <div class="dropdown-panel" id="passengerDropdown">
                        <!-- Passenger Counters -->
                        <div class="traveller-row">
                            <input type="hidden" name="adults" id="adults" value="1">
                            <span data-lang="en">Adults <span>(12y +)</span></span>
                            <span data-lang="es">Adultos <span>(12y +)</span></span>
                            <div>
                                <button type="button" class="count-btn" onclick="changeCount('adult', -1)">-</button>
                                <span class="passenger-count-output" id="adultCount">1</span>
                                <button type="button" class="count-btn" onclick="changeCount('adult', 1)">+</button>
                            </div>
                        </div>
                        <div class="traveller-row">
                            <input type="hidden" name="children" id="children" value="0">
                            <span data-lang="en">Children <span>(2y - 12y)</span></span>
                            <span data-lang="es">Niñas <span>(2y - 12y)</span></span>
                            <div>
                                <button type="button" class="count-btn" onclick="changeCount('child', -1)">-</button>
                                <span class="passenger-count-output" id="childCount">0</span>
                                <button type="button" class="count-btn" onclick="changeCount('child', 1)">+</button>
                            </div>
                        </div>
                        <div class="traveller-row">
                            <input type="hidden" name="infants" id="infants" value="0">
                            <span data-lang="en">Infants <span>(Below 2y)</span></span>
                            <span data-lang="es">Bebés <span>(Below 2y)</span></span>
                            <div>
                                <button type="button" class="count-btn" onclick="changeCount('infant', -1)">-</button>
                                <span class="passenger-count-output" id="infantCount">0</span>
                                <button type="button" class="count-btn" onclick="changeCount('infant', 1)">+</button>
                            </div>
                        </div>

                        <!-- Class Selection -->
                        <div class="form-group mt-3">
                            <label class="travel-class-lbl" data-lang="en">Choose Travel Class</label>
                            <label class="travel-class-lbl" data-lang="es">Elige la clase de viaje</label>
                            <select class="form-control" id="travelClass" >
                                <option value="Economy" data-lang="en">Economy</option>
                                <option value="Economy" data-lang="es">Economía</option>

                                <option value="Business" data-lang="en">Business</option>
                                <option value="Business" data-lang="es">Negocio</option>

                                <option value="First" data-lang="en">First Class</option>
                                <option value="First" data-lang="es">Clase primera</option>
                            </select>
                            <input type="hidden" name="travel_class" id="cabin_class" value="ECONOMY">
                        </div>

                        <!-- Confirm Button -->
                        <div class="mt-3 text-end">
                            <button type="button" class="btn btn-primary btn-sm" onclick="confirmPassengers()" >
                              <span data-lang="en">Confirm</span>
                              <span data-lang="es">Confirmar</span>
                            </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-auto">
                    <div class="d-flex justify-content-center pe-md-3">
                      <button type="submit" name="submit" class="flight-search-btn mx-auto mx-md-0"><i class="fa-solid fa-magnifying-glass"></i> 
                        <span data-lang="en">Search Flights</span>
                        <span data-lang="es">Buscar vuelos</span>
                      </button>
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
            <h3 data-lang="en">Your Trusted Travel Agency</h3>
            <p data-lang="en">Experience seamless bookings, exclusive deals, and personalized service for every journey.</p>

            <h3 data-lang="es">Tu Agencia de Viajes de Confianza</h3>
            <p data-lang="es">Disfruta de reservas sin complicaciones, ofertas exclusivas y un servicio personalizado para cada viaje.</p>

          </div>  
        </div>
      </div>
      <div class="col-md-4">
        <div class="row g-0">
          <div class="service_area col-12">
            <div>
              <div class="service-icon"><i class="fa-solid fa-route"></i></div>
              <h3 data-lang="en">Safe Travels, Every Time</h3>
              <p data-lang="en">Enjoy a secure and worry-free journey with trusted service at every step.</p>

              <h3 data-lang="es">Viajes Seguros, Siempre</h3>
              <p data-lang="es">Disfruta de un recorrido seguro y sin preocupaciones con un servicio confiable en cada paso.</p>

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
            <h3 data-lang="en">Explore World-Class Destinations</h3>
            <p data-lang="en">Discover the most stunning places across the globe, handpicked for unforgettable experiences.</p>

            <h3 data-lang="es">Explora Destinos de Clase Mundial</h3>
            <p data-lang="es">Descubre los lugares más impresionantes del mundo, seleccionados para vivir experiencias inolvidables.</p>

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
        <h5 class="main-title" data-lang="en">Plan Your Perfect Getaway</h5>
        <h2 class="main-hding" data-lang="en">Explore Without Limits</h2>
        <p class="main-prgh mb-4" data-lang="en">
            Turn your travel dreams into reality with curated destinations, flexible flight options, and unbeatable deals. 
            Whether it’s a relaxing escape or a thrilling adventure, we make planning your next trip effortless and exciting.
        </p>

        <h5 class="main-title" data-lang="es">Planifica Tu Escapada Perfecta</h5>
        <h2 class="main-hding" data-lang="es">Explora Sin Límites</h2>
        <p class="main-prgh mb-4" data-lang="es">
          Convierte tus sueños de viaje en realidad con destinos seleccionados, opciones de vuelo flexibles y ofertas incomparables. 
          Ya sea una escapada relajante o una aventura emocionante, hacemos que planear tu próximo viaje sea fácil y emocionante.
        </p>


        <ul class="travel-ftr">
          <li>
            <div class="travel-ftr-icon">
              <i class="fa-solid fa-plane-departure"></i>
            </div>
            <div>
              <h3 class="travel-ftr-hding" data-lang="en">Flexible Flight Options</h3>
              <p class="travel-ftr-content" data-lang="en">Choose from a wide range of airlines and routes tailored to your schedule.</p>

              <h3 class="travel-ftr-hding" data-lang="es">Opciones de Vuelo Flexibles</h3>
              <p class="travel-ftr-content" data-lang="es">Elige entre una amplia variedad de aerolíneas y rutas adaptadas a tu horario.</p>
            </div>
          </li>

          <li>
            <div class="travel-ftr-icon">
              <i class="fa-solid fa-earth-americas"></i>
            </div>
            <div>
              <h3 class="travel-ftr-hding" data-lang="en">Top Destinations</h3>
              <p class="travel-ftr-content" data-lang="en">Explore world-class places handpicked for unforgettable experiences.</p>

              <h3 class="travel-ftr-hding" data-lang="es">Destinos Principales</h3>
              <p class="travel-ftr-content" data-lang="es">Explora lugares de clase mundial seleccionados para experiencias inolvidables.</p>
            </div>
          </li>

          <li>
            <div class="travel-ftr-icon">
              <i class="fa-solid fa-ticket"></i>
            </div>
            <div>
              <h3 class="travel-ftr-hding" data-lang="en">Safe & Secure Booking</h3>
              <p class="travel-ftr-content" data-lang="en">Enjoy a worry-free booking process with instant confirmation.</p>

              <h3 class="travel-ftr-hding" data-lang="es">Reservas Seguras y Confiables</h3>
              <p class="travel-ftr-content" data-lang="es">Disfruta de un proceso de reserva sin preocupaciones con confirmación inmediata.</p>
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
        <h5 class="main-title text-center" data-lang="en">Most Popular Tour</h5>
        <h5 class="main-title text-center" data-lang="es">Tour Más Popular</h5>

        <h2 class="main-hding text-center" data-lang="en">Discover Our Most Popular Tours</h2>
        <h2 class="main-hding text-center" data-lang="es">Descubre Nuestros Tours Más Populares</h2>

        <p class="main-prgh text-center mb-4" data-lang="en">
          From breathtaking landmarks to hidden gems, our top-rated tours are crafted to give you unforgettable memories. Explore the favorites loved by travelers worldwide and find the perfect experience for your next adventure.
        </p>
        <p class="main-prgh text-center mb-4" data-lang="es">
          Desde impresionantes monumentos hasta joyas escondidas, nuestros tours mejor valorados están diseñados para brindarte recuerdos inolvidables. Explora los favoritos de los viajeros de todo el mundo y encuentra la experiencia perfecta para tu próxima aventura.
        </p>

      </div>
      <div class="col-md-4">
        <div class="service_area">
          <img src="assets/images/tour-img-2.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="assets/images/offer-card-1.jpg" alt="offer" class="img-fluid offercard-img" data-lang="en">
        <img src="assets/images/offer-card-1-spanish.jpg" alt="offer" class="img-fluid offercard-img" data-lang="es">
      </div>
      <div class="col-md-6">
        <img src="assets/images/offer-card-2.jpg" alt="offer" class="img-fluid offercard-img" data-lang="en">
        <img src="assets/images/offer-card-2-spanish.jpg" alt="offer" class="img-fluid offercard-img" data-lang="es">
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
        <h5 class="main-title text-center" data-lang="en">Travel Spots Around the Globe</h5>
        <h5 class="main-title text-center" data-lang="es">Destinos de Viaje Alrededor del Mundo</h5>

        <h2 class="main-hding text-center" data-lang="en">Explore Iconic Destinations Worldwide</h2>
        <h2 class="main-hding text-center" data-lang="es">Explora Destinos Icónicos en Todo el Mundo</h2>

        <p class="main-prgh text-center mb-4" data-lang="en">
          Journey to the world’s most sought-after destinations with ease. From vibrant cities to serene escapes, our curated travel options ensure you experience the best each place has to offer—making every trip truly unforgettable.
        </p>
        <p class="main-prgh text-center mb-4" data-lang="es">
          Viaja con facilidad a los destinos más codiciados del mundo. Desde ciudades vibrantes hasta escapadas tranquilas, nuestras opciones de viaje seleccionadas garantizan que disfrutes lo mejor que cada lugar tiene para ofrecer, haciendo que cada viaje sea verdaderamente inolvidable.
        </p>

      </div>
      <div class="w-100"></div>
      <div class="col-sm-6 col-md-4 col-xl-3">
        <div class="tt_dest-box">
          <img src="assets/images/paris.jpg" alt="">
          <h4 class="tt_dest-hding" data-lang="en">Paris</h4>
          <h4 class="tt_dest-hding" data-lang="es">París</h4>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-xl-3">
        <div class="tt_dest-box">
          <img src="assets/images/australia.jpg" alt="">
          <h4 class="tt_dest-hding" data-lang="en">Australia</h4>
          <h4 class="tt_dest-hding" data-lang="es">Australia</h4>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-xl-3">
        <div class="tt_dest-box">
          <img src="assets/images/bangkok.jpg" alt="">
          <h4 class="tt_dest-hding" data-lang="en">Bangkok</h4>
          <h4 class="tt_dest-hding" data-lang="es">Bangkok</h4>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-xl-3">
        <div class="tt_dest-box">
          <img src="assets/images/sydney.jpg" alt="">
          <h4 class="tt_dest-hding" data-lang="en">Sydney</h4>
          <h4 class="tt_dest-hding" data-lang="es">Sídney</h4>
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
          <p class="secure-card-text" data-lang="en">Safe & Secure Booking</p>
          <p class="secure-card-text" data-lang="es">Reserva segura y protegida</p>
        </div>
      </div>
      <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-3">
        <div class="secure-card-2">
          <img src="assets/images/plane.png" alt="secure">
          <p class="secure-card-text" data-lang="en">Flexible Flight</p>
          <p class="secure-card-text" data-lang="es">Vuelo flexible</p>
        </div>
      </div>
      <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-3">
        <div class="secure-card-3">
          <img src="assets/images/best-price.png" alt="secure">
          <p class="secure-card-text" data-lang="en">Best Price Guarantee</p>
          <p class="secure-card-text" data-lang="es">Garantía del mejor precio</p>
        </div>
      </div>
      <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-3">
        <div class="secure-card-4">
          <img src="assets/images/help.png" alt="secure">
          <p class="secure-card-text" data-lang="en">Any Time Customer Help</p>
          <p class="secure-card-text" data-lang="es">Atención al cliente las 24 horas</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="main-hding text-center pb-5" data-lang="en">Frequently Asked Questions (FAQs)</h2>
        <h2 class="main-hding text-center pb-5" data-lang="es">Preguntas Frecuentes (FAQs)</h2>

        <div class="accordion accordion-flush" id="accordionFlushExample">
          <!-- FAQ 1 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" data-lang="en">
                How do I search for the best travel deals?
              </button>
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" data-lang="es">
                ¿Cómo busco las mejores ofertas de viajes?
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body" data-lang="en">Simply enter your destination, travel dates, and number of travelers. Our system will instantly compare prices across airlines to give you the best deals.</div>
              <div class="accordion-body" data-lang="es">Simplemente ingresa tu destino, fechas de viaje y número de viajeros. Nuestro sistema comparará precios entre aerolíneas al instante para ofrecerte las mejores ofertas.</div>
            </div>
          </div>

          <!-- FAQ 2 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" data-lang="en">
                Can I book tours along with flights?
              </button>
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" data-lang="es">
                ¿Puedo reservar tours junto con los vuelos?
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body" data-lang="en">Yes, you can bundle flights with holiday packages, or guided tours to save more and enjoy a complete travel experience.</div>
              <div class="accordion-body" data-lang="es">Sí, puedes combinar vuelos con paquetes vacacionales o tours guiados para ahorrar más y disfrutar de una experiencia de viaje completa.</div>
            </div>
          </div>

          <!-- FAQ 3 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree" data-lang="en">
                Will I get instant confirmation after booking?
              </button>
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree" data-lang="es">
                ¿Recibiré confirmación inmediata después de reservar?
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body" data-lang="en">Yes, once your payment is successful, you will receive an email with your e-ticket or booking voucher instantly.</div>
              <div class="accordion-body" data-lang="es">Sí, una vez que tu pago sea exitoso, recibirás un correo electrónico con tu boleto electrónico o comprobante de reserva al instante.</div>
            </div>
          </div>

          <!-- FAQ 4 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour" data-lang="en">
                What payment methods are supported?
              </button>
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour" data-lang="es">
                ¿Qué métodos de pago se aceptan?
              </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body" data-lang="en">We accept credit/debit cards for fast and secure payments.</div>
              <div class="accordion-body" data-lang="es">Aceptamos tarjetas de crédito/débito para pagos rápidos y seguros.</div>
            </div>
          </div>

          <!-- FAQ 5 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive" data-lang="en">
                Can I reschedule or cancel my booking?
              </button>
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive" data-lang="es">
                ¿Puedo reprogramar o cancelar mi reserva?
              </button>
            </h2>
            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body" data-lang="en">Yes, changes and cancellations are possible depending on airline policies. Fees may apply as per fare rules.</div>
              <div class="accordion-body" data-lang="es">Sí, los cambios y cancelaciones son posibles según las políticas de la aerolínea. Pueden aplicarse cargos según las reglas de la tarifa.</div>
            </div>
          </div>

          <!-- FAQ 6 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingSix">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix" data-lang="en">
                How do I track my flight search details?
              </button>
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix" data-lang="es">
                ¿Cómo puedo rastrear los detalles de mi búsqueda de vuelos?
              </button>
            </h2>
            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body" data-lang="en">You can log in to your account using your my activities to see your details.</div>
              <div class="accordion-body" data-lang="es">Puedes iniciar sesión en tu cuenta y, en la sección "Mis actividades", ver todos los detalles.</div>
            </div>
          </div>

          <!-- FAQ 7 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingSeven">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven" data-lang="en">
                Can I add extras like baggage, meals, or seat selection?
              </button>
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven" data-lang="es">
                ¿Puedo añadir extras como equipaje, comidas o selección de asientos?
              </button>
            </h2>
            <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body" data-lang="en">Yes, after booking you can add extras such as baggage, meals, or seat upgrades directly from the airline “Manage Booking” section.</div>
              <div class="accordion-body" data-lang="es">Sí, después de reservar puedes añadir extras como equipaje, comidas o mejoras de asiento directamente desde la sección “Gestionar Reserva” de la aerolínea.</div>
            </div>
          </div>

          <!-- FAQ 8 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingEight">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight" data-lang="en">
                What documents do I need while traveling?
              </button>
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight" data-lang="es">
                ¿Qué documentos necesito para viajar?
              </button>
            </h2>
            <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body" data-lang="en">For domestic travel, carry a valid government-issued photo ID and your e-ticket. For international trips, a valid passport, visa, and travel insurance may be required.</div>
              <div class="accordion-body" data-lang="es">Para viajes nacionales, lleva una identificación oficial con foto y tu boleto electrónico. Para viajes internacionales, se puede requerir un pasaporte válido, visa y seguro de viaje.</div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>


<?php include("footer.php") ?>


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
  let airportDebounce;
  function setupAutocomplete(inputId, hiddenCodeId, hiddenNameId) {
    getAccessToken().then(token => {
      $("#" + inputId).autocomplete({
        minLength: 2,
        source: function(request, response) {
          clearTimeout(airportDebounce);
          airportDebounce = setTimeout(() => {
            fetch(`https://test.api.amadeus.com/v1/reference-data/locations?subType=AIRPORT&keyword=${request.term}&page[limit]=20`, {
              headers: { "Authorization": "Bearer " + token }
            })
            .then(res => res.json())
            .then(data => response(data.data ? data.data.map(a => ({
              label: `${a.name} (${a.iataCode}) - ${a.address?.cityName || a.name}`,
              value: `${a.name} (${a.iataCode})`,
              code: a.iataCode,
              name: a.name
            })) : []))
            .catch(() => response([]));
          }, 300); // wait 300ms after typing stops
        },
        select: function(event, ui) {
          $("#" + inputId).val(ui.item.value);
          $("#" + hiddenCodeId).val(ui.item.code);
          $("#" + hiddenNameId).val(ui.item.name);
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
    /*window.addEventListener('load', () => {
    const modal = new bootstrap.Modal(document.getElementById('airline_modal'));
    modal.show();
  });*/
  document.addEventListener('DOMContentLoaded', () => {
    if (window.innerWidth <= 768) {
      const modal = new bootstrap.Modal(document.getElementById('airline_modal'));
      modal.show();
    }
  });
</script>

</body>
</html>
 

