<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

</div>
<!-- /.container-fluid -->

<div class="card mx-auto" style="width: 60% ; margin-bottom: 100px">
    <div class="card-body">
        <form method="POST" action="<?php echo base_url('superadmin/data_kecamatan/tambah_data_aksi') ?>" enctype="multipart/form-data">
            <?= form_error(); ?>

            <div class="form-group">
                <label>Nama Kecamatan</label>
                <input type="text" name="nama_kecamatan" class="form-control">
                <?php echo form_error('nama_kecamatan', '<div class="text-small text-danger"> </div>') ?>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat_kecamatan" class="form-control">
                <?php echo form_error('alamat_kecamatan', '<div class="text-small text-danger"> </div>') ?>
            </div>


            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="reset" class="btn btn-danger">Reset</button>
            <a href="<?php echo base_url('superadmin/data_kecamatan') ?>" class="btn btn-warning">Kembali</a>

        </form>
    </div>
</div>