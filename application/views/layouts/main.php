<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets'); ?>/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets'); ?>/img/favicon.png">
    <title>
        Finda - Management System
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?php echo base_url('assets'); ?>/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets'); ?>/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?php echo base_url('assets'); ?>/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?php echo base_url('assets'); ?>/css/argon-dashboard.css" rel="stylesheet" />


    <!-- my Tambahan -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- DataTables CSS with Bootstrap 5 support -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/star-rating.css">
    <style>
    /* Mengatur tombol aksi menjadi di tengah kolom */
    td.td-column-center {
        text-align: center;
    }

    td.td-column-right {
        text-align: right;
    }

    .star {
        cursor: pointer;
    }

    .star.fas {
        color: gold;
        /* Change the color of filled stars */
    }

    .star.far {
        color: #ccc;
        /* Change the color of empty stars */
    }
    </style>

</head>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-gradient-primary position-absolute w-100"></div>
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="<?php echo site_url(''); ?>dashboard/index" target="_blank">
                <img src="<?php echo base_url('assets'); ?>/img/logo-ct-dark.png" class="navbar-brand-img h-100"
                    alt="main_logo">
                <span class="ms-1 font-weight-bold">Management System</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo site_url(''); ?>dashboard/index">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo site_url(''); ?>supplier/index">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-circle-08 text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Suppliers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo site_url(''); ?>product/index">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Product</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo site_url(''); ?>purchaseorder/index">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-secondary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Purchase Order (PO)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo site_url(''); ?>invoice/index">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Invoices</span>
                    </a>
                </li>

                <hr>
                <!-- 
                
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo site_url(''); ?>preorder/index">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-secondary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pre Order (PO)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo site_url(''); ?>invoice/index">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Invoices</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo site_url(''); ?>suratjalan/index">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Surat Jalan</span>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link " href="<?php echo site_url(''); ?>jamaah/index">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-circle-08 text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Jamaah</span>
                    </a>
                </li> -->
                <!-- 
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo site_url(''); ?>pendaftar/index">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-archive-2 text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pendaftar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo site_url(''); ?>galeri/index">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-secondary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Galeri</span>
                    </a>
                </li> -->
                <hr>
                <!-- 
                <?php if ($this->session->userdata('user_level') == '1') {
                    echo '<li class="nav-item"><a class="nav-link" href="' . base_url('scan/index') . '"><div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"><i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i></div><span class="nav-link-text ms-1">Scan Kehadiran Manasik</span></a></li>';
                } else {
                    echo '';
                }
                ?> -->
                <!-- <li class="nav-item">
                    <a class="nav-link " href="<?php echo site_url(''); ?>login/logout">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Keluar</span>
                    </a>
                </li> -->
            </ul>
        </div>
        <div class="sidenav-footer mx-3 ">
            <!-- <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Documentation</a> -->
            <!-- <a class="btn btn-primary btn-sm mb-0 w-100" href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree" type="button">Keluar</a> -->
            <a class="btn btn-primary btn-sm mb-0 w-100" href="<?php echo site_url(''); ?>login/logout"
                type=" button">Keluar</a>
        </div>
    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                                href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                        </div>
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Selamat Datang,
                                    <?php echo $this->session->userdata('user_id'); ?>
                                    lvl<?php echo $this->session->userdata('user_level'); ?></span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <section class="content">
            <?php
            if (isset($_view) && $_view)
                $this->load->view($_view);
            ?>
        </section>
        <?php
        if (isset($jamaah_by_paket) && !empty($jamaah_by_paket)) {
            $labels = array_column($jamaah_by_paket, 'paket');
            $datapie = array_column($jamaah_by_paket, 'jumlah_jamaah');
        }

        if (isset($jamaah_perbulan) && !empty($jamaah_perbulan)) {
            $label_line = array_column($jamaah_perbulan, 'bulan');
            $dataline = array_column($jamaah_perbulan, 'jumlah_jamaah');
        }
        ?>
    </main>

    <!--   Core JS Files   -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS with Bootstrap 5 support -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script src="<?php echo base_url('assets'); ?>/js/core/popper.min.js"></script>
    <!-- <script src="<?php echo base_url('assets'); ?>/js/core/bootstrap.min.js"></script> -->
    <script src="<?php echo base_url('assets'); ?>/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/plugins/chartjs.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/plugins/countup.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo base_url('assets'); ?>/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>