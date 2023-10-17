<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> Edit Data Barang</h3>

    <?php foreach ($barang as $brg) : ?>

        <form method="post" action="<?php echo base_url() . 'admin/data_barang/update' ?>">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="name" class="form-control" value="<?php echo $brg->name ?>">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $brg->id ?>">
                <input type="text" name="keterangan" class="form-control" value="<?php echo $brg->keterangan ?>">
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" value="<?php echo $brg->kategori ?>">
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control" value="<?php echo $brg->harga ?>">
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="text" name="stok" class="form-control" value="<?php echo $brg->stok ?>">
            </div>

            <?php echo anchor('admin/data_barang', '<button type="button" class="btn btn-sm btn-danger mt-3">Kembali</button>') ?>
            <button type="submit" class="btn btn-sm btn-primary mt-3">Simpan</button>
        </form>

    <?php endforeach; ?>
</div>