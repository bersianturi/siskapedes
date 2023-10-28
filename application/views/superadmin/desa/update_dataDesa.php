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

        <?php foreach ($desa as $row) : ?>
            <form method="POST" action="<?php echo base_url('superadmin/data_desa/update_data_aksi') ?>" enctype="multipart/form-data">
                <?= form_error(); ?>
                <div class="form-group">
                    <label>Nama Desa</label>
                    <input type="hidden" name="id_desa" class="form-control" value="<?php echo $row->id_desa ?>">
                    <input type="text" name="nama_desa" class="form-control" value="<?php echo $row->nama_desa ?>">
                    <?php echo form_error('nama_desa', '<div class="text-small text-danger"> </div>') ?>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat_desa" class="form-control" value="<?php echo $row->alamat_desa ?>">
                    <?php echo form_error('alamat_desa', '<div class="text-small text-danger"> </div>') ?>
                </div>

                <div class="form-group">
                    <label>Kecamatan</label>
                    <select name="id_kecamatan" class="form-control">
                        <!-- <option value="<?php echo $row->id_kecamatan ?>">
                            <?php if ($row->id_kecamatan == '1') {
                                echo "Kecamatan A";
                            } else {
                                echo "Kecamatan B";
                            } ?>
                        </option>
                        <option value="1">Kecamatan A</option>
                        <option value="2">Kecamatan B</option> -->
                        <?php foreach ($kecamatan as $pilihan) { ?>
                            <option value="<?= $pilihan->id_kecamatan; ?>" <?php if ($row->id_kecamatan == $pilihan->id_kecamatan) {
                                                                                echo 'selected';
                                                                            } ?>><?= $pilihan->nama_kecamatan; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?php echo base_url('superadmin/desa/data_desa') ?>" class="btn btn-warning">Kembali</a>

            </form>
        <?php endforeach; ?>
    </div>
</div>