<div class="container-fluid">
    <h4>Invoice Pemesanan Produk</h4>

    <div class="table-responsive">
        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Pemesan</th>
                <th class="text-center">Alamat Pengiriman</th>
                <th class="text-center">Tanggal Pemesanan</th>
                <th class="text-center">Batas Pembayaran</th>
                <th class="text-center">Metode Pembayaran</th>
                <th class="text-center">Bukti Transfer</th>
                <th class="text-center">Aksi</th>
            </tr>
            <?php foreach ($invoice as $key => $inv) : ?>
                <tr>
                    <td class="text-center"><?php echo $key + 1 ?></td>
                    <td><?php echo ucwords($inv->nama_user) ?></td>
                    <td><?php echo ($inv->alamat == '') ? '-' : $inv->alamat ?></td>
                    <td class="text-center"><?php echo date('d-m-Y', strtotime($inv->tgl_pesan)) ?></td>
                    <td class="text-center"><?php echo date('d-m-Y', strtotime($inv->batas_bayar)) ?></td>
                    <td><?php echo ($inv->nama_metode == "COD") ? 'Cash On Delivery' : 'Bank ' . $inv->nama_metode ?></td>
                    <td class="text-center"><?php echo anchor(base_url() . 'uploads/' . $inv->bukti_bayar, 'Lihat Bukti', 'target="_blank"') ?></td>
                    <td>
                        <?php echo anchor('admin/invoice/detail/' . $inv->id, '<div class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></div>') ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>