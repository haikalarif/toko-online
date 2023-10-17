<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OLShop - <?= $title ?></title>

    <link rel="website icon" href="<?php echo base_url() ?>assets/img/store.svg">
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
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
                <div class="sidebar-brand-text mx-3">ADMIN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if ($this->uri->segment('2') == 'dashboard_admin') {
                                    echo 'active';
                                } ?>">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard_admin') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item <?php if ($this->uri->segment('2') == 'data_barang') {
                                    echo 'active';
                                } ?>">
                <a class="nav-link" href="<?php echo base_url('admin/data_barang') ?>">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Data Barang</span></a>
            </li>

            <li class="nav-item <?php if ($this->uri->segment('2') == 'invoice') {
                                    echo 'active';
                                } ?>">
                <a class="nav-link" href="<?php echo base_url('admin/invoice') ?>">
                    <i class="fas fa-fw fa-file-invoice"></i>
                    <span>Invoices</span></a>
            </li>

            <li class="nav-item <?php if ($this->uri->segment('2') == 'kategori') {
                                    echo 'active';
                                } ?>">
                <a class="nav-link" href="<?php echo base_url('admin/kategori') ?>">
                    <i class="fas fa-fw fa-list-ul"></i>
                    <span>Kategori</span></a>
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

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <ul class="nav navbar-nav navbar-right">
                            <?php if ($this->session->userdata('username')) { ?>
                                <li>
                                    <div class="mt-2">Hallo, <?php echo $this->session->userdata('username') ?></div>
                                </li>
                                <li class="ml-2"><?php echo anchor('auth/logout', '<div class="btn btn-sm btn-primary mt-1">Logout</div>') ?></li>
                            <?php } else { ?>
                                <li><?php echo anchor('auth/login', '<div class="btn btn-sm btn-primary mt-3">Login</div>') ?></li>
                            <?php } ?>
                        </ul>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <?php echo $contents ?>

                <footer style="background-color: #DDD;">
                    <div class="container-fluid px-5 mt-lg-3 text-center text-gray-700 py-3">
                        <span>Copyright <i class="far fa-copyright"></i> Manajemen Proyek Teknik Informatika 2023</span>
                    </div>
                </footer>
            </div>
            <!-- End Main Content -->

        </div>
        <!-- End Content Wrapper -->

    </div>
    <!-- End Page Wrapper -->

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

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        $(function() {
            Highcharts.chart('ChartTes', {
                // title: {
                //     text: 'Jumlah Barang Terjual'
                // },
                // xAxis: {
                //     categories: <?php echo json_encode($chart_data['labels']); ?>
                // },
                // legend: {
                //     layout: 'horizontal',
                //     align: 'center',
                //     // verticalAlign: 'middle'
                // },
                // yAxis: {
                //     title: {
                //         text: 'Jumlah'
                //     },
                //     min: 0,
                //     max: 10,
                // },
                // series: [{
                //     name: 'Jumlah Terjual',
                //     data: <?php echo json_encode($chart_data['datas']); ?>
                // }],

                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Jumlah Barang Terjual'
                },
                accessibility: {
                    announceNewData: {
                        enabled: true
                    }
                },
                xAxis: {
                    type: 'category',
                    categories: <?php echo json_encode($chart_data['labels']); ?>
                },
                yAxis: {
                    title: {
                        text: 'Jumlah'
                    }

                },
                legend: {
                    enabled: true
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}%'
                        }
                    }
                },

                // tooltip: {
                //     headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                //     pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                // },

                series: [{
                    name: 'Jumlah Terjual',
                    colorByPoint: true,
                    data: <?php echo json_encode($chart_data['datas']); ?>
                }],
            });
        });
    </script>
</body>

</html>