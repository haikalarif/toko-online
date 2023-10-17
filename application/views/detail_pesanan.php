<div class="container-fluid my-5">
    <h4 class="mt-5 mb-3" style="margin-left: 14vw;">
        <?php echo anchor('history', '<i class="fas fa-arrow-circle-left text-gray-600"></i>') ?>
        <strong>Detail Pesanan</strong>
    </h4>
    <?php
    foreach ($pesanan as $item) : ?>
        <div class="card col-lg-8 mx-lg-auto mb-3">
            <h5 class="card-header"><i class="fas fa-map-marker-alt"></i> Alamat Pengiriman</h5>
            <div class="card-body">
                <span><?php echo $item->nama ?></span><br>
                <span><?php echo $item->no_telp ?></span><br>
                <span><?php echo $item->alamat ?></span>
            </div>
            <hr class="mb-1">
            <h5 class="card-header"><i class="fas fa-truck"></i> Informasi Pengiriman</h5>
            <div class="card-body">
                <span>Pesanan Dikirim dengan <?php echo $item->jasa_kirim ?> - (<?php echo ($item->status == 0) ? 'Pesanan Masih dalam Perjalanan' : 'Pesanan Sudah Diterima' ?>)</span><br>
            </div>
        </div>
        <div class="card col-lg-8 mx-lg-auto">
            <h5 class="card-header"><i class="fas fa-box-open"></i> Detail Produk</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <img class="card-img-top rounded" src="<?php echo base_url() . '/uploads/' . $item->gambar ?>" alt="">
                    </div>
                    <div class="col-md-7">
                        <table class="table mt-lg-4">
                            <tr>
                                <td style="border-top: 0px;">
                                    <h3 class="mb-0"><strong><?php echo $item->nama_brg ?></strong></h3>
                                </td>
                            </tr>
                            <tr>
                                <td style="border-top: 0px; height: 12vh;"><?php echo $item->keterangan ?></td>
                            </tr>
                            <tr>
                                <td style="border-top: 0px;">Metode Pembayaran</td>
                                <td class="text-right" style="border-top: 0px;"><?php echo ($item->nama_metode == 'COD') ? $item->nama_metode : 'Bank ' . $item->nama_metode ?></td>
                            </tr>
                            <tr>
                                <td style="border-top: 0px;">Waktu Pemesanan</td>
                                <td class="text-right" style="border-top: 0px;"><?php echo date('d-m-Y H:i:s', strtotime($item->tgl_pesan)) ?></td>
                            </tr>
                            <tr>
                                <td style="border-top: 0px;"><?php echo $item->jumlah ?> Produk</td>
                                <td class="text-primary text-right" style="border-top: 0px;">
                                    Rp. <?php echo number_format($item->harga, 0, ',', '.') ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <h5><strong>Total Pesanan : </strong></h5>
                <h5><strong>Rp. <?php echo number_format($item->harga, 0, ',', '.') ?></strong></h5>
            </div>
        </div>
    <?php endforeach; ?>

</div>