<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OLShop - Dashboard</title>

    <link rel="website icon" href="<?php echo base_url() ?>assets/img/store.svg">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">OLShop</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if ($this->uri->segment('1') == 'welcome') {
                                    echo 'active';
                                } ?>">
                <a class="nav-link" href="<?php echo base_url('welcome') ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                KATEGORI
            </div>

            <li class="nav-item <?php if ($this->uri->segment('2') == 'elektronik') {
                                    echo 'active';
                                } ?>">
                <a class="nav-link" href="<?php echo base_url('kategori/elektronik') ?>">
                    <i class="fas fa-fw fa-tv"></i>
                    <span>Elektronik</span></a>
            </li>
            <li class="nav-item <?php if ($this->uri->segment('2') == 'pakaian_pria') {
                                    echo 'active';
                                } ?>">
                <a class="nav-link" href="<?php echo base_url('kategori/pakaian_pria') ?>">
                    <i class="fas fa-fw fa-tshirt"></i>
                    <span>Pakaian Pria</span></a>
            </li>
            <li class="nav-item <?php if ($this->uri->segment('2') == 'pakaian_wanita') {
                                    echo 'active';
                                } ?>">
                <a class="nav-link" href="<?php echo base_url('kategori/pakaian_wanita') ?>">
                    <i class="fas fa-fw fa-tshirt"></i>
                    <span>Pakaian Wanita</span></a>
            </li>
            <li class="nav-item <?php if ($this->uri->segment('2') == 'pakaian_anak_anak') {
                                    echo 'active';
                                } ?>">
                <a class="nav-link" href="<?php echo base_url('kategori/pakaian_anak_anak') ?>">
                    <i class="fas fa-fw fa-tshirt"></i>
                    <span>Pakaian Anak-Anak</span></a>
            </li>
            <li class="nav-item <?php if ($this->uri->segment('2') == 'peralatan_olahraga') {
                                    echo 'active';
                                } ?>">
                <a class="nav-link" href="<?php echo base_url('kategori/peralatan_olahraga') ?>">
                    <i class="fas fa-fw fa-volleyball-ball"></i>
                    <span>Peralatan Olahraga</span></a>
            </li>
            <li class="nav-item <?php if ($this->uri->segment('2') == 'makanan') {
                                    echo 'active';
                                } ?>">
                <a class="nav-link" href="<?php echo base_url('kategori/makanan') ?>">
                    <i class="fas fa-fw fa-volleyball-ball"></i>
                    <span>Makanan</span></a>
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

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="navbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <?php
                                    $keranjang = '<span class="badge badge-pill badge-secondary d-flex ml-4">' . $this->cart->total_items() . '</span><i class="fas fa-shopping-cart" style="font-size:28px;"></i>'
                                    ?>

                                    <?php echo anchor('dashboard/detail_keranjang', $keranjang) ?>
                                </li>
                            </ul>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <ul class="nav navbar-nav navbar-right">
                                <?php if ($this->session->userdata('username')) { ?>
                                    <li>
                                        <div class="mt-1">Hallo, <?php echo $this->session->userdata('username') ?></div>
                                    </li>
                                    <li class="ml-2">
                                        <?php echo anchor('auth/logout', '<div class="btn btn-sm btn-info">Logout</div>') ?>
                                    </li>
                                <?php } else { ?>
                                    <li><?php echo anchor('auth/login', '<div class="btn btn-sm btn-primary mt-2">Login</div>') ?></li>
                                <?php } ?>
                            </ul>
                        </div>

                    </ul>

                </nav>

                <?php echo $contents ?>

            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>

    <script>
        $(function() {
            Highcharts.chart('chart-container', {
                title: {
                    text: 'Jumlah Kategori Barang'
                },
                xAxis: {
                    categories: <?php echo json_encode($chart_data['categories']); ?>
                },
                yAxis: {
                    title: {
                        text: 'Jumlah'
                    }
                },
                series: [{
                    name: 'Kategori',
                    data: <?php echo json_encode($chart_data['data']); ?>
                }]
            });
        });
    </script>

</body>

</html>