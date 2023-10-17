<div class="container-fluid px-5 mt-lg-3">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner rounded">
            <div class="carousel-item active">
                <img src="<?php echo base_url('assets/img/slider1.jpg') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url('assets/img/slider2.jpg') ?>" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <section>
        <h3 class="mt-5"><strong>Kategori</strong></h3>
        <div class="row">
            <?php foreach ($kategori as $kat) : ?>
                <div class="col-lg-2 mb-2">
                    <a href="<?php echo base_url('kategori/' . $kat->url) ?>" class="text-decoration-none">
                        <div class="card text-center text-gray-600">
                            <div class="card-body">
                                <i class="fas <?php echo $kat->icon ?> fa-2x"></i>
                                <h6 class="card-title mt-2"><?php echo $kat->nama ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <?php if (count($makanan) > 0) { ?>
        <div class="row text-center mt-4 d-flex justify-content-center">
            <?php foreach ($makanan as $elk) : ?>

                <div class="card ml-3 mb-3" style="width: 16rem;">
                    <img src="<?php echo base_url() . '/uploads/' . $elk->gambar ?>" class="card-img-top img-fluid" alt="..." style="object-fit:cover; height: 195px;">
                    <div class="card-body">
                        <h5 class="card-title mb-1"><?php echo $elk->name ?></h5>
                        <small><?php echo $elk->keterangan ?></small><br>
                        <span class="badge badge-success my-3 p-2">Rp. <?php echo number_format($elk->harga, 0, ',', '.') ?></span><br>
                        <?php echo anchor('dashboard/tambah_ke_keranjang/' . $elk->id, '<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>') ?>
                        <?php echo anchor('dashboard/detail/' . $elk->id, '<div class="btn btn-sm btn-outline-info">Detail</div>') ?>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    <?php } else { ?>
        <div class="alert alert-danger mt-3 text-center" role="alert">
            <strong>Data Tidak Ditemukan</strong>
        </div>
    <?php } ?>
</div>