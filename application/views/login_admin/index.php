<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $title; ?></title>

	<!-- Bootstrap css -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">

	<!-- Font Awesome-->
	<link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<link href="<?= base_url(); ?>assets/css/style-auth.css" rel="stylesheet" type="text/css">

</head>

<body class="body-background">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-100">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block">
								<div class="info-login text-center">
									<h1>DIAGNOSIS PENYAKIT BAWANG MERAH</h1><br>
									<p>Masuk untuk melanjutkan</p>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<div class="row">
											<div class="col-md-4"></div>
											<div class="col-md-4 mb-4 login-profile">
												<img src="assets/img/upload/admin.svg" style="width: 100px;"
													alt="login">
											</div>
										</div>
									</div>
									<form class="form-login" method="post" action="" autocomplete="off">
										<div class="form-group text-center alert-login">
										</div>
										<div class="form-group mb-4">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-user mt-2"></i>
												</div>
												<input type="text" class="form-control" name="username" id="username"
													placeholder="Masukkan Username" required>
											</div>
											<hr class="input">
										</div>
										<div class="form-group mb-4">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-key mt-2"></i>
												</div>
												<input type="password" class="form-control" name="password"
													id="password" placeholder="Kata sandi" required>
											</div>
											<hr class="input">
										</div>
										<button type="submit" class="btn btn-primary btn-user btn-block" id="masuk"><i
												class="fas fa-sign-in-alt"></i>
											Masuk
										</button>
									</form>
									<hr>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<!-- Bootstrap-->
	<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>


	<!-- Core plugin JavaScript-->
	<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
	
	<!-- Font Awesome -->
	<script src="<?= base_url(); ?>assets/vendor/fontawesome-free/js/all.min.js"></script>

	<script src="<?= base_url(); ?>assets/js/script/auth-script.js"></script>

</body>

</html>
