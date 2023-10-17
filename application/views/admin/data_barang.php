<div class="container-fluid mt-5" style="margin-bottom: 15vh;">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambahBarang"><i class="fas fa-plus fa-sm"></i> Tambah Barang</button>

    <?php if ($this->session->flashdata('alert')) : ?>
        <div class="alert alert-<?php echo $this->session->flashdata('alert_class'); ?>">
            <i class="fas <?php echo $this->session->flashdata('alert_icon'); ?>"></i>
            <b><?php echo $this->session->flashdata('alert'); ?></b>
        </div>
    <?php endif; ?>

    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger">
            <i class="fas fas fa-exclamation-circle"></i>
            <?php echo validation_errors(); ?>
        </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <tr class="text-center">
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Keterangan</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        foreach ($barang as $brg) : ?>

            <tr>
                <td align="center"><?php echo $no++ ?></td>
                <td><?php echo $brg->name ?></td>
                <td><?php echo $brg->keterangan ?></td>
                <td><?php echo $brg->name ?></td>
                <td>Rp. <?php echo number_format($brg->harga, 0, ',', '.') ?></td>
                <td align="center"><?php echo $brg->stok ?></td>
                <td align="center">
                    <div class="btn btn-success btn-sm"><i class="fas fa-eye"></i></div>
                    <button class="btn btn-warning btn-sm edit-btn" data-toggle="modal" data-target="#editBarang<?php echo $brg->id; ?>"><i class="fa fa-edit"></i></button>
                    <?php echo anchor('admin/data_barang/hapus/' . $brg->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
                </td>
            </tr>

            <!-- Modal Edit -->
            <div class="modal fade" id="editBarang<?php echo $brg->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Edit Produk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url() . 'admin/data_barang/update' ?>" method="post" enctype="multipart/form-data">
                                <input type="text" name="id" class="form-control" value="<?php echo $brg->id; ?>" hidden>

                                <div class="form-group">
                                    <label>Nama Barang <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $brg->name ?>" placeholder="Masukkan Nama Barang...">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan <span class="text-danger">*</span></label>
                                    <input type="text" name="keterangan" class="form-control" value="<?php echo $brg->keterangan ?>" placeholder="Masukkan Keterangan...">
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="kategori" class="form-control">
                                        <option value="<?php echo $brg->kategori; ?>"><?php echo $brg->nama ?></option>
                                        <?php foreach ($kategori as $kat) : ?>
                                            <option value="<?php echo $kat->id_kategori; ?>"><?php echo $kat->nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Harga <span class="text-danger">*</span></label>
                                    <input type="text" name="harga" class="form-control" value="<?php echo $brg->harga; ?>" placeholder="Masukkan Harga Barang...">
                                </div>
                                <div class="form-group">
                                    <label>Stok <span class="text-danger">*</span></label>
                                    <input type="text" name="stok" class="form-control" value="<?php echo $brg->stok; ?>" placeholder="Masukkan Stok Barang...">
                                </div>
                                <div class="form-group">
                                    <label>Gambar Produk</label><br>
                                    <img src="<?php echo base_url('uploads/' . $brg->gambar); ?>" alt="Gambar Lama" width="100">
                                    <input type="file" name="gambar" class="form-control">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    </table>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Input Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'admin/data_barang/tambah_aksi' ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Barang <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Barang...">
                    </div>
                    <div class="form-group">
                        <label>Keterangan <span class="text-danger">*</span></label>
                        <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan...">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control">
                            <option>--Pilih Kategori--</option>
                            <?php foreach ($kategori as $kat) : ?>
                                <option value="<?php echo $kat->id_kategori; ?>"><?php echo $kat->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga <span class="text-danger">*</span></label>
                        <input type="text" name="harga" class="form-control" placeholder="Masukkan Harga Barang...">
                    </div>
                    <div class="form-group">
                        <label>Stok <span class="text-danger">*</span></label>
                        <input type="text" name="stok" class="form-control" placeholder="Masukkan Stok Barang...">
                    </div>
                    <div class="form-group">
                        <label>Gambar Produk</label><br>
                        <input type="file" name="gambar" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>