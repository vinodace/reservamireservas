 
<footer id="footer">
	<div class="container">
		<div class="row justify-content-between pb-3">
			<div class="col-md-12">
				<div class="footer-top-contact">
					<div class="footer-logo">
						<a href="<?= $root_path ?>">
							<img src="<?= $root_path ?>assets/images/logo-book-my-reservation.png" alt="logo" data-lang="en">
							<img src="<?= $root_path ?>assets/images/logo.png" alt="logo" data-lang="es">
						</a>
					</div>
					<div class="contact-detail">
						<div class="contact-item">
							<div class="contact-item-icon">
								<i class="fa-solid fa-phone-volume"></i>
							</div>
							<div class="contact-item-txt dynamic-phone-link" >
							USA	<?php echo $phone_number_us; ?> <br>
							UK	<?php echo $phone_number_uk; ?><br>
							Mexico	<?php echo $phone_number_spain; ?>
							</div>
						</div>
						<div class="contact-item">
							<div class="contact-item-icon">
								<i class="fa-solid fa-envelope"></i>
							</div>
							<div class="contact-item-txt">
								<?php echo $email_address_web4; ?>
							</div>
						</div>
						<div class="contact-item">
							<div class="contact-item-icon">
								<i class="fa-solid fa-house"></i>
							</div>
							<div class="contact-item-txt">
								<?php echo $domain_address_web4; ?>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="col-12 col-md-12">
				<div class="d-flex justify-content-md-center">
					<div>
						<h2 class="footer-main-hding" data-lang="en">Connect With Us</h2>
						<h2 class="footer-main-hding" data-lang="es">Conéctese con nosotros</h2>
						<ul class="ftr_social-icon">
							<li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
							<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
						</ul>
					</div>
				</div>	
				<ul class="ftr_bot_menu">
				  <li>
				    <a href="<?= $root_path ?>" data-lang="en">Flights</a>
				    <a href="<?= $root_path ?>" data-lang="es">Vuelos</a>
				  </li>
				  <li>
				    <a href="<?= $root_path ?>flights-offers.php" data-lang="en">Today's Deals</a>
				    <a href="<?= $root_path ?>flights-offers.php" data-lang="es">Ofertas de Hoy</a>
				  </li>
				  <li>
				    <a href="<?= $root_path ?>about-us.php" data-lang="en">About Us</a>
				    <a href="<?= $root_path ?>about-us.php" data-lang="es">Sobre Nosotros</a>
				  </li>
				  <li>
				    <a href="<?= $root_path ?>contact-us.php" data-lang="en">Contact Us</a>
				    <a href="<?= $root_path ?>contact-us.php" data-lang="es">Contáctanos</a>
				  </li>
				  <li>
				    <a href="<?= $root_path ?>privacy-policy.php" data-lang="en">Privacy Policy</a>
				    <a href="<?= $root_path ?>privacy-policy.php" data-lang="es">Política de Privacidad</a>
				  </li>
				  <li>
				    <a href="<?= $root_path ?>terms-and-conditions.php" data-lang="en">Terms & Conditions</a>
				    <a href="<?= $root_path ?>terms-and-conditions.php" data-lang="es">Términos y Condiciones</a>
				  </li>
				  <li>
				    <a href="<?= $root_path ?>cancellation-and-refund-policy.php" data-lang="en">Cancellation & Refund Policy</a>
				    <a href="<?= $root_path ?>cancellation-and-refund-policy.php" data-lang="es">Política de Cancelación y Reembolso</a>
				  </li>
				</ul>
	
			</div>
			
		</div>
	</div>	
	<div class="copyright_bg_web2">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p class="ftr-copyright text-center">Derechos de autor © <script>document.write(new Date().getFullYear())</script> <?php echo $domainurl_web4 ?>. Reservados todos los derechos</p>
				</div>

			</div>
		</div>
	</div>	
</footer>

<script async src="https://www.googletagmanager.com/gtag/js?id=G-2JNLT3J95Y"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
<script src="<?= $root_path ?>assets/js/custom-js.js"></script>
<script src="<?= $root_path ?>assets/js/language-change.js"></script>
