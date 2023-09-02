<?php
	$title = "About";
	require_once "./app/components/header.php";
?>


<main id="main">
    <section id="features" class="features">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="row feature-icons" data-aos="fade-up">

                    <div class="row">
                        <div class="col-xl-4 text-center" data-aos="fade-right" data-aos-delay="100">
                            <img src="assets/img/features-3.png" class="img-fluid p-4" alt="">
                        </div>

                        <div class="col-xl-8 d-flex content">
                            <div class="row align-self-center gy-4">
                                <div class="col-md-6 icon-box" data-aos="fade-up">
                                    <i class="ri-line-chart-line"></i>
                                    <div>
                                        <h4>Evolving</h4>
                                        <p>With <strong id="users">0</strong> actives users, our website is constantly evolving.</p>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                    <i class="ri-stack-line"></i>
                                    <div>
                                        <h4>Known</h4>
                                        <p>A known tech stack with Linux, Apache, PHP, MariaDB.</p>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                    <i class="ri-error-warning-line"></i>
                                    <div>
                                        <h4>Secure</h4>
                                        <p>Secure and safe thanks to good development practice.</p>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                    <i class="ri-shield-user-fill"></i>
                                    <div>
                                        <h4>Administration</h4>
                                        <p>A very good administration team with <strong id="admins">0</strong> administrators</p>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                                    <i class="ri-chat-1-line"></i>
                                    <div>
                                        <h4>Active chat</h4>
                                        <p>With <strong id="messages">0</strong> messages sended on this chat
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- / row -->
        </div>
    </section>
</main>

<script>
    fetch("/app/api/stats.php").then((response) => {
        response.json().then((data) => {
            document.getElementById("users").innerText = data[0].users;
            document.getElementById("admins").innerText = data[1].admins;
            document.getElementById("messages").innerText = data[2].messages;
        });
    });
</script>

<?php require_once "./app/components/footer.php"; ?>
			