<?php
session_start();
if (!isset($_SESSION['username']) and empty($_SESSION['username'])){
	echo("<script>window.location.href = '../login/login.php';</script>"); 
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
<script>
function deletemsg(id, user, pass){
  axios.get("../api/chat.php?id=" + id + "&user=" + user + "&password=" + pass).then( 
      response => {
          console.log(response.data);
      }
)

window.location.href = '/reload.php';
}
</script>


<div>
<fieldset class="thechat"> 
<pre style="color: #000;">


<?php 

include_once("../includes/db-config.php");
$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASS);

$add = "";
$request = $pdo -> query("SELECT * FROM `chat`");

foreach($request->fetchall() as $req){
  

  $id = $req['id'];
  $icon = $req['icon'];
  $author = $req['author'];
  $text = $req['msg'];


  
  if($req['author'] == $_SESSION['username']){ $color = "#4154f1"; } else { $color = "#03afed"; } 
  
  if(!empty($icon)){
    if($author == $_SESSION['username'] or $_SESSION['isadmin'] == '1' ){
      $exec = "window.location.href = \"/api/chat.php?id=" . $id . "  \" ";
  
      $text .= ' <button style="background-color: #e0e0ef;border: none;" onclick=\'' . $exec . '\'><i style="color: #4154f1;" class="bi bi-trash2-fill"></i></button>' ; //. $text;
    }

    
    if($author == $precedentuser){
      echo("<span>" . $text . '<br>' . '<span>');

    }
    else {
      echo("<span>" . $add . "<strong style=\"color: $color;\"><i class=\"$icon\"></i></a> $author: </strong>  
$text</span><br>");
    }
  }
  $add = "<br>";
  $precedentuser = $author;

}



?></pre>


</fieldset>
<form method="post" action="../api/chat.php">
    <p  style="border-top: 0px !important; font-size: 17px; margin-left: 3%; margin-right: 3%;border: #0f0f0f 1px solid; height: 61px;width: 94%;background-color: #e0e0ef;">
        <input type="text" name="text" class="chatmenu" id="text" placeholder="Send a message">
        <button style="background-color: #4154f1;color: white;border: 1px #4154f1 solid;border-radius: 5px;width: 8%;height: 85%;margin-top: 4px;"><i class="bi bi-arrow-clockwise"></i></button>
        <button type="submit" style="background-color: #4154f1;color: white;border: 1px #4154f1 solid;border-radius: 5px;width: 8%;height: 85%;margin-top: 4px;"><i class="bi bi-send-fill"></i></button>
    </p> 
</form>
</div>



  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script>
    document.getElementById("text").focus();
  </script>
  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html> 
