<div class="container-fluid mt-5" style="margin-bottom: 43vh;">
    <h4>Detail Pesanan <div class="btn btn-sm btn-success">No. Invoice: <?php echo $pesanan[0]->id ?></div>
    </h4>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th class="text-center">ID Barang</th>
            <th>Nama Produk</th>
            <th class="text-center">Jumlah Pesanan</th>
            <th class="text-center">Harga Satuan</th>
            <th class="text-center">Sub Total</th>
        </tr>

        <?php
        $total = 0;
        foreach ($pesanan as $psn) :
            $subtotal = $psn->jumlah * $psn->harga;
            $total += $subtotal;
        ?>
            <tr>
                <td align="center"><?php echo $psn->id_brg ?></td>
                <td><?php echo $psn->nama_brg ?></td>
                <td align="center"><?php echo $psn->jumlah ?></td>
                <td align="right"><?php echo number_format($psn->harga, 0, ',', '.') ?></td>
                <td align="right"><?php echo number_format($subtotal, 0, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4" align="right"><strong>Grand Total</strong></td>
            <td align="right"><strong>Rp. <?php echo number_format($total, 0, ',', '.') ?></strong></td>
        </tr>
    </table>

    <a href="<?php echo base_url('admin/invoice/index') ?>">
        <div class="btn btn-sm btn-primary"><i class="fas fa-arrow-circle-left mr-2"></i> Kembali</div>
    </a>

</div>