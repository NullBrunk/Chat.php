<?php
session_start();
if (!isset($_SESSION['username']) and empty($_SESSION['username'])){
	echo("<script>window.location.href = '../user/login.php';</script>"); 
    die();  
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
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <script src="../assets/js/jquery.min.js.js"></script>
  <script src="../assets/js/axios.min.js"></script>

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
        <span></span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>

          <li class="getstarted dropdown" style="color: white !important; padding: 0px 20px 0px 0px !important;/*! padding-right: 10px !important; */">
          
          <a href="#">
            
            <span style="color: white;">Profile</span> 
            <i style="color: white;" class="bi bi-chevron-right"></i></a>
            
            <ul>
                  <li><a href="../index.php">Home</a></li>
                  <li><a href="users.php">Chat</a></li>
                  <li><a href="settings.php">Settings</a></li>
                  <li><a href="logout.php">Logout</a></li>
                </ul>
              </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  <main>

  <!-- ======= Counts Section ======= -->
  <br>
  <section id="counts" class="counts">

  <header class="section-header">
          <h2>Profile</h2>
          <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']);?></p>
        </header>

      
            </div>
          </div>


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="padding: 0;">

      <div class="container" data-aos="fade-up">

     

          <div class="col-lg-6">Change password :

            <form method="get" action="../api/users.php" class="php-email-form">
              <div class="row gy-4">

                <div class="col-md-12">
                  <input type="password" class="form-control" name="npass" placeholder="New password" required>
                </div>


                <div class="col-md-12">


                  <button type="submit">Change password</button>
                </div>

              </div>
            </form>



          </div>

        </div>

      </div>

    </section><!-- End Contact Section -->


<?php

if($_SESSION['isadmin'] == '1'){
  echo('    

  <section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

      <div class="col-lg-6">Ban users :
        <form method="post" class="php-email-form">
          <div class="row gy-4">
          <div class="col-md-12">
              <input type="text" class="form-control" name="toban" placeholder="User to ban" required>
              </div>

              <div class="col-md-12">
              <button type="submit">Ban user</button>
            </div>
          </div>
        </form>
  ');
}


if(!empty($_POST['opass']) && !empty($_POST['npass'])){

  $name = htmlspecialchars($_SESSION['username']);
  $npass = htmlspecialchars($_POST['npass']);
  $opass = htmlspecialchars($_POST['opass']);

  echo("<script>changepass('$opass', '$npass', '$name')</script>");
}

if(!empty($_POST['toban']) and $_SESSION['isadmin'] == '1'){

  $toban = htmlspecialchars($_POST['toban']);
  echo("User have been banned !");
  include_once("../includes/db-config.php");
  $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASS);
  
  $request = $pdo -> prepare("DELETE FROM users where username=:user");
    $request -> execute([
      "user" => $toban,
    ]);
}
?>


    </div>

  </div>

</div>

</section><!-- End Contact Section -->

</main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html> 
