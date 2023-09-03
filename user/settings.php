<?php
	require_once "../app/middleware/logged.php";

	$title = "Settings";
	require_once "../app/components/header.php";

?>
<section class="ftco-section" style='padding-top: 9em;'>
	<div class="container">

		<div class="row justify-content-center">
            <div class="icon d-flex align-items-center justify-content-center">
                <span class="bi bi-user-fill"></span>
            </div>

            <h3 class="text-center mb-4">Welcome, <?= ucfirst($_SESSION["username"]) ?></h3>
						
					
            <div class="mt-4">
                <h4>Delete your account</h4>
                <div class="form-group d-flex">
					
                    <input type="password" id="pass" class="form-control rounded m-2 p-2" placeholder="Your password" required>                    
                    <button type="submit" id="delete" class="btn btn-danger rounded fw-600 m-2 p-2">DELETE</button>

                </div>
            </div>

		</div>
	</div>
</section>
<script src="/assets/js/settings.js"></script>


<?php require_once "../app/components/footer.php"; ?>


