<?php 
	$phone_number_web4 = "+52 8008017795"; // Spanish Number
	$phone_number_us = "+1-800-267-0020";
	$email_address_web4 = "info@reservamisreservas.com";
	$domainurl_web4 ="reservamisreservas.com";
	$domain_name_web4 = "Reserva Mi Reservas";
	$domain_address_web4 ="7900 N Stadium Drive Houston, TX 77030";

  	if ($_SERVER['HTTP_HOST'] == 'localhost') {
    // Localhost path
	    $root_path = '/ace-digital-solution/projects/September/new-website/';
	} else {
	    // Live site path
	    $root_path = '/';
	}

?>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- <meta name="robots" content="noindex, nofollow"> -->
	<!-- Favicon icon -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"> 
    <!-- Bootstrap v5.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Font Awesome Free 6.7.2 -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" type="text/css" href="<?= $root_path ?>assets/css/main.css">
    <!-- Jquery UI -->
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
	
</head>
<body>
<header> 
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light">
		    <a  href="<?= $root_path ?>">
		    	<img src="<?= $root_path ?>assets/images/logo.png" alt="" class="navbar-brand">
		    </a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNavDropdown">
		    	<?php
		              $nav_url1=$nav_url3=$nav_url4=$nav_url5=$nav_url6="";
		              $tt=explode("/",$_SERVER['PHP_SELF']);
		              $len=count($tt)-1;
		              $cur_page=$tt[$len];
		              switch($cur_page)
		              {
		              case "index.php":
		              $nav_url1='active';
		              break;
		              case "flights-offers.php":
		              $nav_url2='active';
		              break;
		              case "about-us.php":
		              $nav_url3='active';
		              break;
		              case "privacy-policy.php":
		              $nav_url4='active';
		              break;
		              }
		        ?>
		      <ul class="navbar-nav mx-auto header-navbar">
			      <li class="nav-item">
			        <a class="nav-link <?php echo $nav_url1; ?>" href="./">Flights</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link <?php echo $nav_url2; ?>" href="<?= $root_path ?>flights-offers.php">Today's Deals</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link <?php echo $nav_url3; ?>" href="<?= $root_path ?>about-us.php">About Us</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link <?php echo $nav_url4; ?>" href="<?= $root_path ?>privacy-policy.php">Privacy Policy</a>
			      </li>
		      </ul>
		      <a href="<?= $root_path ?>contact-us.php" class="header-btn">
                <span class="me-2"><i class="fa-solid fa-headphones"></i></span> Contact to Expert               
              </a>
		      <!-- <a href="#" class="header-btn">
                <i class="fa-regular fa-circle-user"></i> Login/Signup               
              </a> -->
		      <a href="tel:<?php echo $phone_number_web4; ?>" class="header-tollfree">
		      	<img src="<?= $root_path ?>assets/images/header-tfn-icon.png" alt="">
		      	<div>
			      	<p>Speak to Expert Now</p>
			      	<span><?php echo $phone_number_web4; ?></span>
		      	</div>		
		      </a>
		    </div>
		</nav>
	</div>	
</header>
<!-- Header -->

<?php include("breadcrumb.php") ?>