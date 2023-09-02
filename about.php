<?php
    $title = "Index";
    require_once "./app/components/header.php";
?>

<main id="main">
    <section id="features" class="features">
        <div class="container" data-aos="fade-up">
            <div class="row">

                <div class="col-lg-6">
                    <img src="assets/img/chat.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                    <div class="row align-self-center gy-4">

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                            <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-check"></i>
                            <h3>PHP / JS webchat</h3>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                            <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-check"></i>
                            <h3>Internal RestfulAPI </h3>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                            <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-check"></i>
                            <h3>MariaDB database</h3>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                            <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-check"></i>
                            <h3>Backend in raw PHP </h3>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                            <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-check"></i>
                            <h3>Admin / User panel</h3>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                            <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-check"></i>
                            <h3>Secure auth mecanism</h3>
                            </div>
                        </div>

                    </div>
                </div>
            </div> 
        </div>
    </section>
</main>

<?php require_once "./app/components/footer.php"; ?>


