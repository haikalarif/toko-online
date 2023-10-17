<div class="container-fluid px-5 mt-lg-3">
    <!-- <div id="chart-container" style="width: 100%; height: 400px;"></div> -->

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
            <div class="carousel-item">
                <img src="<?php echo base_url('assets/img/slider4.jpg') ?>" class="d-block w-100" alt="...">
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
                        <div class="card text-center text-gray-600 card-kategori">
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

    <section>
        <div class="row mt-4 d-flex justify-content-center">
            <?php foreach ($barang as $key => $brg) {
                $query = $this->db->select('COUNT(id_brg) as total_terjual')
                    ->from('tb_pesanan')
                    ->where('id_brg', $brg->id)
                    ->get();
                $result = $query->row();
            ?>

                <a href="<?php echo base_url('dashboard/detail/' . $brg->id) ?>" class="text-gray-600 text-decoration-none">
                    <div class="card ml-3 mb-3" style="width: 16rem;">
                        <img src="<?php echo base_url() . '/uploads/' . $brg->gambar ?>" class="card-img-top img-fluid" alt="..." style="object-fit:cover; height: 195px;">
                        <div class="card-body">
                            <h5 class="card-title text-center mb-1"><?php echo $brg->name ?></h5>
                            <small><?php echo $brg->keterangan ?></small><br>
                            <h5 class="text-primary my-3"><strong>Rp. <?php echo number_format($brg->harga, 0, ',', '.') ?></strong></h5>

                            <?php if ($result) { ?>
                                <small class="float-right"><?php echo $result->total_terjual ?> Terjual</small><br>
                            <?php } else { ?>
                                <small class="float-right">0 Terjual</small><br>
                            <?php }  ?>
                            <?php echo anchor('dashboard/detail/' . $brg->id, '<div class="btn btn-sm btn-primary d-block mt-1">Detail</div>') ?>
                        </div>
                    </div>
                </a>

            <?php } ?>
        </div>
    </section>

</div>