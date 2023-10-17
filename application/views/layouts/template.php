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

    <script src="https://code.highcharts.com/highcharts.js"></script>

    <style>
        .card-kategori {
            transition: transform 0.3s;
        }

        .card-kategori:hover {
            transform: scale(1.1);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body id="page-top">

    <header>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand text-info" href='/toko'><i class="fas fa-store rotate-n-15"></i> <strong>OLShop</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="form-inline my-2 my-lg-0 mx-auto">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" style="width:31rem;">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                    </form>

                    <ul class="navbar-nav float-right">
                        <li class="mr-3">
                            <?php
                            $keranjang = '<span class="badge badge-pill badge-secondary d-flex ml-4">' . $this->cart->total_items() . '</span><i class="fas fa-shopping-cart text-info" style="font-size:28px;"></i>'
                            ?>

                            <?php echo anchor('dashboard/detail_keranjang', $keranjang) ?>
                        </li>
                    </ul>

                    <ul class="navbar-nav float-right">
                        <?php if ($this->session->userdata('username')) { ?>
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-white">Hallo, <?php echo ucwords($this->session->userdata('nama')) ?></span>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="<?php echo base_url('history') ?>">
                                        <i class="fas fa-file-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        History
                                    </a>
                                    <!-- <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a> -->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        <?php } else { ?>
                            <li><?php echo anchor('auth/login', '<div class="btn btn-sm btn-info mt-2">Login</div>') ?></li>
                            <li><?php echo anchor('registrasi/index', '<div class="btn btn-sm btn-outline-info mt-2 ml-2">Daftar</div>') ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section>
        <div id="wrapper">
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">

                    <?php echo $contents ?>

                </div>
            </div>
        </div>
    </section>

    <footer class="bg-primary">
        <div class="container-fluid px-5 mt-lg-3 text-white py-5">
            <div class="row">
                <div class="col-3">
                    <h6 style="font-size: 17px;"><strong>Tentang Kami</strong></h6>
                    <ul class="list-unstyled">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white px-0" style="font-size: 14px;">Karir</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white px-0" style="font-size: 14px;">Syarat & Ketentuan</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white px-0" style="font-size: 14px;">Kebijakan Privasi</a>
                        </li>
                    </ul>
                </div>
                <div class="col-3">
                    <h6 style="font-size: 17px;"><strong>Pembayaran</strong></h6>
                    <ul class="list-unstyled">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white px-0" style="font-size: 14px;">BCA</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white px-0" style="font-size: 14px;">BRI</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white px-0" style="font-size: 14px;">BSI</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white px-0" style="font-size: 14px;">Mandiri</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white px-0" style="font-size: 14px;">Cash On Delivery</a>
                        </li>
                    </ul>
                </div>
                <div class="col-3">
                    <h6 style="font-size: 17px;"><strong>Pengiriman</strong></h6>
                    <ul class="list-unstyled">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white px-0" style="font-size: 14px;">JNE</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white px-0" style="font-size: 14px;">JNT</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white px-0" style="font-size: 14px;">Ninja Xpress</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white px-0" style="font-size: 14px;">Sicepat</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white px-0" style="font-size: 14px;">Pos Indonesia</a>
                        </li>
                    </ul>
                </div>
                <div class="col-3">
                    <h6 style="font-size: 17px;"><strong>Ikuti Kami</strong></h6>
                    <ul class="list-unstyled d-flex flex-row align-items-start">
                        <li class="nav-item">
                            <a href="#" class="nav-link px-2 text-decoration-none text-info">
                                <i class="fab fa-facebook fa-2x"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link px-2 text-decoration-none text-info">
                                <i class="fab fa-instagram-square fa-2x"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link px-2 text-decoration-none text-info">
                                <i class="fab fa-twitter-square fa-2x"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link px-2 text-decoration-none text-info">
                                <i class="fab fa-linkedin fa-2x"></i>
                            </a>
                        </li>
                    </ul>
                    <a class="navbar-brand text-info" href="#" style="font-size: 40px;"><i class="fas fa-store rotate-n-15"></i> <strong>OLShop</strong></a>
                </div>
            </div>
        </div>
        <div class="container-fluid px-2 text-center text-gray-500 py-3">
            <span>Copyright <i class="far fa-copyright"></i> Manajemen Proyek Teknik Informatika 2023</span>
        </div>
    </footer>

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
                    categories: <?php echo json_encode($chart_data['labels']); ?>
                },
                yAxis: {
                    title: {
                        text: 'Jumlah'
                    }
                },
                series: [{
                    name: 'Kategori',
                    data: <?php echo json_encode($chart_data['datas']); ?>
                }]
            });
        });
    </script>

</body>

</html>