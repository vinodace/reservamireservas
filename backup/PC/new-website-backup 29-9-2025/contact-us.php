<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contact Us</title>

<?php include("header.php"); ?>

<section class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-4 pe-lg-0">
      <div class="contact-adrs-box">
        <h2 class="main-hding pb-4">Get in Tourch</h2>
        <address>
          <div class="mb-3 d-flex align-items-start gap-4">
            <p class="text-primary fa-2x mb-0">
              <i class="fa-solid fa-phone-volume"></i>
            </p>
            <div>
              <h3 class="main-subhding mb-0">Call Us</h3>
              <a href="tel:<?php echo $phone_number_web4; ?>" class="main-prgh d-block text-decoration-none"><?php echo $phone_number_web4; ?></a>
            </div>  
          </div>
          <div class="mb-3 d-flex align-items-start gap-4">
            <p class="text-primary fa-2x mb-0">
              <i class="fa-solid fa-envelope"></i>
            </p>
            <div>
              <h3 class="main-subhding mb-0">Email</h3>
              <a href="maito:<?php echo $email_address_web4; ?>" class="main-prgh d-block text-decoration-none"><?php echo $email_address_web4; ?></a>
            </div>  
          </div>
          <div class="mb-3 d-flex align-items-start gap-4">
            <p class="text-primary fa-2x mb-0">
              <i class="fa-solid fa-building"></i>
            </p>
            <div>
              <h3 class="main-subhding mb-0">Address</h3>
              <p class="main-prgh d-block text-decoration-none">
                <?php echo $domain_address_web4; ?>
              </p>
            </div>  
          </div>
          
        </address>
      </div>
    </div>
    <div class="col-lg-5 ps-lg-0">
      <div class="contact_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3465.8581058124796!2d-95.41188032533373!3d29.694893275101453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c0114d1377d9%3A0x81a29a89259126db!2s7900%20N%20Stadium%20Dr%2C%20Houston%2C%20TX%2077030%2C%20USA!5e0!3m2!1sen!2sin!4v1758890594321!5m2!1sen!2sin" style="border:0; width:100%; height: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</section>

<?php include("footer.php") ?>


</body>
</html>
 

