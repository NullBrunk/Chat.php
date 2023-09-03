<?php
	$title = "Index";
	require_once "./app/components/header.php";
?>

<section id="hero" class="hero d-flex align-items-center">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
    
                <h1 data-aos="fade-up">A PHP WebChat </h1>
                <h2 data-aos="fade-up" data-aos-delay="400">A simple PHP WebChat that use's an internal API to manage messages/users, called using AJAX request threw JavaScript .</h2>
                
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">
                        <a href="/auth/login.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Login</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

            </div>

            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="assets/img/hero.png" class="img-fluid" alt="">
            </div>
            
        </div>
    </div>

</section>


<?php require_once "./app/components/footer.php"; ?>

