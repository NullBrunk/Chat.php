<?php
	require_once "../app/middleware/guest.php";

	$title = "Login";
	require_once "../app/components/header.php";

?>
<script src="/assets/js/auth.js"></script>
<link href="style.css" rel="stylesheet">

<section class="ftco-section" style='padding-top: 9em;'>
	<div class="container">

		<div class="row justify-content-center">
			<div class="col-md-7 col-lg-5">
				<div class="login-wrap p-4 p-md-5">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="bi bi-person-fill-add"></span>
					</div>

					<h3 class="text-center mb-4">Signup</h3>
						
						
					<div method="post" class="login-form">

						<div id="invalid" class="d-none alert alert-danger"></div>
						<div id="signup" class="d-none alert alert-success">Signed up !</div>

						<div class="form-group">
							<input type="text" id="name" name="name" class="form-control rounded-left" placeholder="Username" required>
						</div>
						
						<div class="form-group d-flex">
							<input type="password" id="pass" name="pass" class="form-control rounded-left" placeholder="Password" required>
						</div>

						<div class="form-group d-flex">
							<input type="password" id="repass" name="repass" class="form-control rounded-left" placeholder="Re Password" required>
						</div>
						
						<div class="form-group">
							<button type="submit" id="signup-button"	 class="form-control btn btn-primary rounded submit px-3">Signup</button>
						</div>

							
						
						<div class="text-right">
								<a href="login.php">Login</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script>
		do_signup();
	</script>

</section>

<?php require_once "../app/components/footer.php"; ?>

