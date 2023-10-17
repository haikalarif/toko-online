<div class="container-fluid my-5">
    <h4 class="mt-5 mb-3 ml-lg-5"><strong>History Pesanan</strong></h4>

    <div class="row mt-4 d-flex justify-content-center">

        <?php foreach ($detail_pesanan->result() as $key => $item) : ?>
            <div class="card ml-3 mb-3" style="width: 16rem;">
                <img src="<?php echo base_url() . '/uploads/' . $item->gambar ?>" class="card-img-top img-fluid" alt="..." style="object-fit:cover; height: 195px;">
                <div class="card-body">
                    <h5 class="card-title text-center mb-3"><?php echo $item->nama_brg ?></h5>
                    <small><i class="far fa-credit-card"></i> Pembayaran Bank <?php echo $item->nama_metode ?></small><br>
                    <div class="d-flex justify-content-between mt-3">
                        <small><?php echo $item->jumlah ?> Produk</small>
                        <p class="text-primary"><strong>Rp. <?php echo number_format($item->harga, 0, ',', '.') ?></strong></p>
                    </div>
                    <small><i class="fas fa-truck"></i> Dikirim dengan <?php echo $item->jasa_kirim ?></small>
                </div>
                <div class="card-footer d-flex justify-content-around">
                    <?php echo anchor('history/detail/' . $item->id_pesanan, '<div class="btn btn-info btn-xs px-4 py-1"> Detail</div>') ?>
                    <?php
                    if ($item->status == 0) {
                        echo anchor('history/terima/' . $item->id_pesanan, '<div class="btn btn-success btn-xs px-4 py-1"> Terima</div>');
                    } else {
                        echo anchor('history/rating/' . $item->id_pesanan, '<div class="btn btn-warning btn-xs px-4 py-1"> Nilai</div>');
                    }
                    ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>