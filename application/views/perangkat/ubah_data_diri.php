<div class="container-fluid">
    <div class="card mb-4 col-lg-10 mx-auto">
        <div class="card-header">Perbarui Data Diri</div>
        <div class="card-body">
            <?php foreach ($perangkat as $row) { ?>
                <form action="<?= base_url('perangkat/data_diri') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $row->id_perangkat; ?>">
                        <label for="nama">Nama Lengkap</label>
                        <input class="form-control" id="nama" type="text" name="nama" placeholder="Nama" value="<?= $row->nama_perangkat; ?>">
                        <?= form_error('nama'); ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="gelar_depan">Gelar Depan</label>
                                <input class="form-control" id="gelar_depan" type="text" name="gelar_depan" placeholder="Gelar Depan" value="<?= $row->gelar_depan; ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="gelar_belakang">Gelar Belakang</label>
                                <input class="form-control" id="gelar_belakang" type="text" name="gelar_belakang" placeholder="Gelar Belakang" value="<?= $row->gelar_belakang; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="NIK">Nomor Induk Kependudukan</label>
                        <input class="form-control" type="text" name="nik" id="NIK" value="<?= $row->nik; ?>">
                        <?= form_error('nik'); ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input class="form-control" id="tempat_lahir" type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= $row->tempat_lahir; ?>">
                                <?= form_error('tempat_lahir'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input class="form-control" id="tanggal_lahir" type="date" name="tanggal_lahir" value="<?= $row->tgl_lahir; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control form-control-solid" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="Laki-Laki" <?php if ($row->jenis_kelamin == 'Laki-Laki') {
                                                            echo 'selected';
                                                        } ?>>Laki-Laki</option>
                            <option value="Perempuan" <?php if ($row->jenis_kelamin == 'Perempuan') {
                                                            echo 'selected';
                                                        } ?>>Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="pendidikan">Pendidikan</label>
                        <select name="pendidikan" class="form-control">
                            <option value="">--Pilih Pendidikan--</option>
                            <?php foreach ($pendidikan as $pd) : ?>
                                <option value="<?php echo $pd->tingkat_pendidikan ?>" <?php if ($row->pendidikan == $pd->tingkat_pendidikan) {
                                                                                            echo 'selected';
                                                                                        } ?>><?php echo $pd->tingkat_pendidikan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Agama</label>
                        <select name="agama" class="form-control">
                            <option value="Islam" <?php if ($row->agama == 'Islam') {
                                                        echo 'selected';
                                                    } ?>>Islam</option>
                            <option value="Kristen" <?php if ($row->agama == 'Kristen') {
                                                        echo 'selected';
                                                    } ?>>Kristen</option>
                            <option value="Katolik" <?php if ($row->agama == 'Katolik') {
                                                        echo 'selected';
                                                    } ?>>Katolik</option>
                            <option value="Hindu" <?php if ($row->agama == 'Hindu') {
                                                        echo 'selected';
                                                    } ?>>Hindu</option>
                            <option value="Buddha" <?php if ($row->agama == 'Buddha') {
                                                        echo 'selected';
                                                    } ?>>Buddha</option>
                            <option value="Konghucu" <?php if ($row->agama == 'Konghucu') {
                                                            echo 'selected';
                                                        } ?>>Konghucu</option>
                            <option value="Lainnya" <?php if ($row->agama == 'Lainnya') {
                                                        echo 'selected';
                                                    } ?>>Lainnya</option>
                        </select>
                        <?php echo form_error('agama', '<div class="text-small text-danger"> </div>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="no_pengangkatan">Nomor Pengangkatan</label>
                        <input class="form-control" id="no_pengangkatan" type="text" name="no_pengangkatan" placeholder="Nomor Pengangkatan" value="<?= $row->no_pengangkatan; ?>">
                        <?= form_error('no_pengangkatan'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="no_pengangkatan">Tanggal Pengangkatan</label>
                        <input class="form-control" id="tgl_pengangkatan" type="text" name="tgl_pengangkatan" placeholder="Tanggal Pengangkatan" value="<?= $row->tgl_pengangkatan; ?>">
                        <?= form_error('tgl_pengangkatan'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="no_pengangkatan">Nomor Pemberhentian</label>
                        <input class="form-control" id="no_pemberhentian" type="text" name="no_pemberhentian" placeholder="Nomor Pemberhentian" value="<?= $row->no_pemberhentian; ?>">
                        <?= form_error('no_pemberhentian'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_pemberhentian">Tanggal Pemberhentian</label>
                        <input class="form-control" id="tgl_pemberhentian" type="text" name="tgl_pemberhentian" placeholder="Tanggal Pemberhentian" value="<?= $row->tgl_pemberhentian; ?>">
                        <?= form_error('tgl_pemberhentian'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan">Jabatan</label>
                        <select name="jabatan" class="form-control">
                            <option value="">--Pilih Jabatan--</option>
                            <?php foreach ($jabatan as $j) : ?>
                                <option value="<?php echo $j->nama_jabatan ?>" <?php if ($row->jabatan == $j->nama_jabatan) {
                                                                                    echo 'selected';
                                                                                } ?>><?php echo $j->nama_jabatan ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="masa_jabatan">Masa Jabatan</label>
                        <input class="form-control" id="masa_jabatan" type="text" name="masa_jabatan" placeholder="Masa Jabatan" value="<?= $row->masa_jabatan; ?>">
                        <?= form_error('masa_jabatan'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select class="form-control form-control-solid" name="status" id="status">
                            <option value="Aktif" <?php if ($row->agama == 'Aktif') {
                                                        echo 'selected';
                                                    } ?>>Aktif</option>
                            <option value="Non-Aktif" <?php if ($row->agama == 'Non-Aktif') {
                                                            echo 'selected';
                                                        } ?>>Non-Aktif</option>
                        </select>
                    </div>
                    <input class="form-control" id="verifikasi_data" type="text" name="verifikasi_data" placeholder="Masa Jabatan" value="belum_disetujui" style="display: none">
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="photo" class="form-control">
                    </div>

                    <div class="mb-3 d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">
                            Simpan
                        </button>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>