<div class="container-fluid px-5 mt-lg-3 mb-lg-3">
    <h4 class="mt-5 mb-3"><strong>Keranjang Belanja</strong></h4>
    <div class="row">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Nama Produk</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Sub Total</th>
            </tr>
            <?php if (count($this->cart->contents()) > 0) { ?>
                <?php
                $no = 1;
                foreach ($this->cart->contents() as $items) : ?>
                    <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td><?php echo $items['name'] ?></td>
                        <td class="text-center"><?php echo $items['qty'] ?></td>
                        <td align="right">Rp. <?php echo number_format($items['price'], 0, ',', '.') ?></td>
                        <td align="right"> Rp. <?php echo number_format($items['subtotal'], 0, ',', '.') ?></td>
                    </tr>

                <?php endforeach; ?>
            <?php } else { ?>
                <tr>
                    <td align="center" colspan="5" class="text-danger">Keranjang Anda Masih Kosong!</td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="4"></td>
                <td align="right"><b>Rp. <?php echo number_format($this->cart->total(), 0, ',', '.') ?></b></td>
            </tr>
        </table>

        <div class="mt-3">
            <a href="<?php echo base_url('dashboard/hapus_keranjang') ?>">
                <div class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Hapus Keranjang</div>
            </a>
            <a href="<?php echo base_url() ?>">
                <div class="btn btn-sm btn-primary"><i class="fas fa-shopping-cart"></i> Lanjutkan Belanja</div>
            </a>
            <a href="<?php echo base_url('dashboard/pembayaran') ?>">
                <div class="btn btn-sm btn-success"><i class="far fa-credit-card"></i> Bayar Sekarang</div>
            </a>
        </div>
    </div>
</div>