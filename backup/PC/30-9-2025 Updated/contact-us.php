<?php 
  include ("lang-change.php");
?>
<!DOCTYPE html>
<html lang="<?php echo $lang;?>">

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
    <div class="col-lg-9">
        <div class="contact-form mt-4" style="background: #f7f7f7; padding:40px;">
            <h3 class="main-subhding">Fill The Contact Form</h3>
            <p class="main-prgh">Feel free to contact with us, we don't spam your email</p>
            <form action="enquiry.php" method="post">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <input type="text" name="name" class="form_field_web2" id="name" placeholder="Your name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <input type="tel" name="phone" class="form_field_web2" id="phone" placeholder="Phone number">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <input type="email" name="email" class="form_field_web2" id="email" placeholder="Email address">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <textarea name="message" class="form_field_web2" id="message" placeholder="Write your message"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="submit" class="common-btn">
                            Send Message
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</section>

<?php include("footer.php") ?>


</body>
</html>
 

