<?php if(!isset($_SESSION)) session_start(); ?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">

        <title><?= $title ?></title>

        <!-- Favicons -->
        <link href="/assets/img/webchatlogo.png" rel="icon">
        <link href="/assets/img/webchatlogo.png" rel="apple-touch-icon">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <link href="/assets/css/style.css" rel="stylesheet">

    </head>

    
        <header id="header" class="header fixed-top">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

                <a href="/index.php" class="logo d-flex align-items-center">
                    <img src="/assets/img/webchatlogo.png" alt="">

                </a>

                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto" href="/about.php">About</a></li>
                        <li><a class="nav-link scrollto" href="/statistics.php">Statistics</a></li>
                        <li><a target="_blank" href="https://github.com/NullBrunk/PHPChat">Source</a></li>
                        <li><a class="nav-link scrollto " href="/auth/signup.php">Sign-up</a></li>
                        <?php if(!isset($_SESSION["logged"])): ?>
                            <li><a class="getstarted scrollto active" href="/auth/login.php">Login</a></li>
                        <?php else: ?>
                            <li class="getstarted dropdown" style="color: white !important; padding: 0px 20px 0px 0px !important;/*! padding-right: 10px !important; */">
                                <a href="#">
                                    <span style="color: white;">Profile</span> 
                                    <i style="color: white;" class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li>
                                            <a href="/user/" class="btn btn-purple m-2 rounded text-white  justify-content-start">
                                                <i class="bi bi-chat-right-text"></i>
                                                <span class="px-4">Chat</span>
                                            </a>
                                        </li>
                                        
                                        <li>
                                            <a href="/user/settings.php" class="btn btn-purple m-2 rounded text-white  justify-content-start">
                                                <i class="bi bi-sliders"></i>
                                                <span class="px-4">Settings</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="/user/logout.php" class="btn btn-danger m-2 rounded text-white justify-content-start" style="justify-content: flex-start !important;">
                                                <i class="bi bi-box-arrow-right"></i>
                                                <span class="px-4">Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </a>
                            </li>
                        <?php endif; ?>
                        </ul>
                        <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->
    <body>