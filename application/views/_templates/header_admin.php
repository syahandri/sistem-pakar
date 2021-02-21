<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $judul; ?></title>

	<!-- Bootstrap css -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
	<!-- Font Awesome-->
	<link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Style sb admin-2 -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/sb-admin-2.min.css">

	<!-- Data tables -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/datatables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/datatables/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/datatables/fixedHeader.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/datatables/fixedColumns.bootstrap4.min.css">
	
	<!-- my style -->
	<!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/css/myStyle.css"> -->

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<div class="sidebar-brand d-flex align-items-center justify-content-center">
				<div class="sidebar-brand-text">Diagnosis Penyakit Bawang Merah</div>
			</div>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item beranda">
				<a class="nav-link" href="<?= base_url('dasboard'); ?>">
					<i class="fas fa-fw fa-home"></i>
					<span>Beranda</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Menu
			</div>

			<li class="nav-item gejala">
				<a class="nav-link" href="<?= base_url('Gejala'); ?>">
					<i class="fas fa-fw fa-disease"></i>
					<span>Data Gejala</span>
				</a>
			</li>

			<li class="nav-item penyakit">
				<a class="nav-link" href="<?= base_url('Penyakit'); ?>">
					<i class="fas fa-fw fa-viruses"></i>
					<span>Data Penyakit</span>
				</a>
			</li>

			<li class="nav-item relasi">
				<a class="nav-link" href="<?= base_url('Relasi'); ?>">
					<i class="fas fa-fw fa-retweet"></i>
					<span>Relasi Gejala & Penyakit</span>
				</a>
			</li>
			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Riwayat
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item history">
				<a class="nav-link" href="<?= base_url('History'); ?>">
					<i class="fas fa-fw fa-book-open"></i>
					<span>Riwayat Diagnosis</span>
				</a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<h3 class="judul"><?= $judul; ?></h3>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span
									class="mr-2 d-none d-lg-inline text-gray-600 small profile-name"><?= $this->session->userdata('ses_user'); ?></span>
								<img class="img-profile profile-image rounded-circle" src="assets/img/upload/admin.svg">
							</a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <a class="dropdown-item" href ="<?= base_url('Auth/logoutAdmin'); ?>"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-dark-400"></i> Keluar </a>
                                </a>
                            </div>
						</li>
					</ul>
				</nav>
				<!-- End of Topbar -->
