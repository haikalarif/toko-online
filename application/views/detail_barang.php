<div class="container-fluid my-5">

    <div class="card">
        <h5 class="card-header">Detail Produk</h5>
        <div class="card-body">
            <?php foreach ($barang as $brg) : ?>
                <div class="row">
                    <div class="col-md-4">
                        <img class="card-img-top rounded" src="<?php echo base_url() . '/uploads/' . $brg->gambar ?>" alt="">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td><strong>Nama Produk</strong></td>
                                <td><?php echo $brg->name ?></td>
                            </tr>
                            <tr>
                                <td><strong>Kategori</strong></td>
                                <td><?php echo $brg->nama ?></td>
                            </tr>
                            <tr>
                                <td><strong>Stok</strong></td>
                                <td><?php echo $brg->stok ?></td>
                            </tr>
                            <tr>
                                <td><strong>Harga</strong></td>
                                <td>
                                    <div class="btn btn-sm btn-success">Rp. <?php echo number_format($brg->harga, 0, ',', '.') ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Keterangan</strong></td>
                                <td><?php echo $brg->keterangan ?></td>
                            </tr>
                        </table>

                        <div class="mt-5">
                            <?php echo anchor('/', '<div class="btn btn-sm btn-danger px-2 py-2"><i class="fas fa-arrow-left"></i> Kembali</div>') ?>
                            <?php echo anchor('dashboard/tambah_ke_keranjang/' . $brg->id, '<div class="btn btn-sm btn-primary pe-3 py-2"><i class="fas fa-cart-plus fa-lg"></i> Masukkan Keranjang</div>') ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>