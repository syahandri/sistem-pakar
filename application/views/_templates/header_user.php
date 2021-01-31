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
                <a class="nav-link" href="<?= base_url(); ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Diagnosa
            </div>

            <li class="nav-item diagnosa">
                <a class="nav-link" href="<?= base_url('Diagnosa_Penyakit'); ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Diagnosa Penyakit</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Riwayat
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item riwayat">
                <a class="nav-link" href="<?= base_url('Riwayat'); ?>">
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
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="<?= base_url('Auth/logout'); ?>">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small profile-name">Login Admin</span>
                                <img class="img-profile profile-image rounded-circle" src="assets/img/upload/admin.svg">
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->