<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambahKategori"><i class="fas fa-plus fa-sm"></i> Tambah Barang</button>

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

    <div class="table-responsive">
        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
            <tr>
                <th class="text-center" width="2%">No.</th>
                <th class="text-center">Nama Kategori</th>
                <th class="text-center" width="15%">Aksi</th>
            </tr>

            <?php
            $no = 1;
            foreach ($kategori as $kat) : ?>

                <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td><?php echo $kat->nama ?></td>
                    <td class="text-center">
                        <div class="btn btn-success btn-sm"><i class="fas fa-eye"></i></div>
                        <button class="btn btn-warning btn-sm edit-btn" data-toggle="modal" data-target="#editKategori<?php echo $kat->id_kategori; ?>"><i class="fa fa-edit"></i></button>
                        <?php echo anchor('admin/kategori/hapus/' . $kat->id_kategori, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
                    </td>
                </tr>

                <!-- Modal Edit Kategori -->
                <div class="modal fade" id="editKategori<?php echo $kat->id_kategori; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Edit Kategori</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url() . 'admin/kategori/update' ?>" method="post" enctype="multipart/form-data">
                                    <input type="text" name="id" class="form-control" value="<?php echo $kat->id_kategori; ?>" hidden>

                                    <div class="form-group">
                                        <label>Nama Kategori</label>
                                        <input type="text" name="nama" class="form-control" value="<?php echo $kat->nama; ?>">
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
                <!-- Akhir Modal Edit Kategori -->

            <?php endforeach; ?>

        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Input Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'admin/kategori/tambah' ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" name="nama" class="form-control">
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