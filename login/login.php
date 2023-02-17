<?php
session_start();
if (isset($_SESSION['username']) and !empty($_SESSION['username'])){
	echo("<script>window.location.href = '../user/users.php';</script>");   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>WebChat</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/css/css/font-awesome.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <script src="../assets/js/axios.min.js"></script>
  <link href="style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.12.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
	<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="../index.php" class="logo d-flex align-items-center">
        <img src="../assets/img/webchatlogo.png" alt="">

      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="../index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="../about.php">About</a></li>
          <li><a class="nav-link scrollto" href="../statistics.php">Statistics</a></li>
          <li><a target="_blank" href="https://github.com/AnasDB/Chat">Source</a></li>
          <li><a class="nav-link scrollto" href="../contact.php">Contact</a></li>
          <li><a class="nav-link scrollto " href="signup.php">Sign-up</a></li>
          <li><a class="getstarted scrollto active" href="login.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
	
<body>

	<br>
	<section class="ftco-section">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user"></span>
		      	</div>

		      	<h3 class="text-center mb-4">Connexion</h3>
				
				
				<form method="post" class="login-form">
		      		<div class="form-group">
		      			<input type="text" id="name" name="name" class="form-control rounded-left" placeholder="Username" required>
		      		</div>
	            
					<div class="form-group d-flex">
	              		<input type="password" id="pass" name="pass" class="form-control rounded-left" placeholder="Password" required>
	            	</div>
	            
					<div class="form-group">
	            		<button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
	            	</div>

					
	            
					<div class="form-group d-md-flex">
	            
					<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember me
							<input type="checkbox" checked>
							<span class="checkmark"></span>
						</label>
								
						</div>
							<div class="w-50 text-md-right">
								<a href="signup.php">Créer un compte</a>
						</div>

	            	</div>
	          </form>
			</div>
		</div>
	</div>
</div>
</section>

<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/popper.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../../assets/js/main_login.js"></script>

	</body>
</html>


<?php

if (!empty($_POST['name']) && !empty($_POST['pass'])){

	include_once("../includes/db-config.php");
	$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASS);

	$user = htmlspecialchars($_POST['name']);
	$pass = htmlspecialchars($_POST['pass']);

	$ch = curl_init();
	
	$request = $pdo -> prepare("SELECT * FROM users WHERE username=:user AND BINARY password=:pass");
	$request -> execute([
		"user" => $user,
		"pass" => $pass
	]);

	$r = $request -> fetch();

	if (!empty($r)){

			$_SESSION['username'] = $r['username'];
			$_SESSION['password'] = $r['password'];
			$_SESSION['isadmin'] = $r['isadmin'];
			echo("<script>window.location.href = '../user/users.php';</script>"); 
	}
	else {
		echo("<script>alert('Invalid credentials');</script>");
	}
	
}

?>
