<?php
session_start();

if (isset($_SESSION['connected']) and !empty($_SESSION['connected'])){
	echo("<script>window.location.href = '../user/users.php'</script>");
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
  <script src="../assets/js/axios.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
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
          <li><a class="nav-link scrollto " href="../index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="../about.php">About</a></li>
          <li><a class="nav-link scrollto" href="../statistics.php">Statistics</a></li>
          <li><a target="_blank" href="https://github.com/a-na-s/Chat">Source</a></li>
          <li><a class="nav-link scrollto" href="../contact.php">Contact</a></li>
          <li><a class="nav-link scrollto active" href="signup.php">Sign-up</a></li>
          <li><a class="getstarted scrollto" href="login.php">Login</a></li>
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
				  <span class="fa fa-user-plus"></span>
		      	</div>

		      	<h3 class="text-center mb-4">Sign-up</h3>
				
				
				<form method="post" class="login-form">
		      		<div class="form-group">
		      			<input type="text" id="name" name="name" class="form-control rounded-left" placeholder="Username" required>
		      		</div>
	            
					<div class="form-group d-flex">
	              		<input type="password" id="pass1" name="pass1" class="form-control rounded-left" placeholder="Password" required>
	            	</div>

					<div class="form-group d-flex">
	              		<input type="password" id="pass2" name="pass2" class="form-control rounded-left" placeholder="Re-type password" required>
	            	</div>
	            
					<div class="form-group">
	            		<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign-up</button>
	            	</div>
	            
					<div class="form-group d-md-flex">
	            
					<div class="w-50">

						</div>
							<div class="w-50 text-md-right">
								<a href="login.php">Login</a>
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


<script>

function adduser(user, pass){
	axios({
		method: 'post',
		url: '../api/users.php', 
		data: {
    		username: user,
    		password: pass
  		}
	}).then(function (response) {
    	console.log(response);
  	})
}
</script>
<?php

if (!empty($_POST['name']) && !empty($_POST['pass1']) && !empty($_POST['pass2'])){
	if($_POST['pass1'] == $_POST['pass2']){
		$n = $_POST["name"];
		$p = $_POST['pass1'];
		echo("<script>adduser('$n', '$p')</script>");
		echo("<script>alert('Accounted created')</script>");
	
	}
}
?>

</body>
</html>