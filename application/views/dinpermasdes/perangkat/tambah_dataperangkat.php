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
    <form method="POST" action="<?php echo base_url('dinpermasdes/data_perangkat/tambah_data_aksi') ?>" enctype="multipart/form-data">
      <?= form_error(); ?>

      <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_perangkat" class="form-control">
        <?php echo form_error('nama_perangkat', '<div class="text-small text-danger"> </div>') ?>
      </div>

      <div class="form-group">
        <label>Gelar Depan</label>
        <input type="text" name="gelar_depan" class="form-control">
        <?php echo form_error('gelar_depan', '<div class="text-small text-danger"> </div>') ?>
      </div>

      <div class="form-group">
        <label>Gelar Belakang</label>
        <input type="text" name="gelar_belakang" class="form-control">
        <?php echo form_error('gelar_belakang', '<div class="text-small text-danger"> </div>') ?>
      </div>

      <div class="form-group">
        <label>Nomor Induk Kependudukan</label>
        <input type="number" name="nik" class="form-control">
        <?php echo form_error('nik', '<div class="text-small text-danger"> </div>') ?>
      </div>
      <div class="form-group">
        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control">
        <?php echo form_error('tempat_lahir', '<div class="text-small text-danger"> </div>') ?>
      </div>
      <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" class="form-control">
        <?php echo form_error('tgl_lahir', '<div class="text-small text-danger"> </div>') ?>
      </div>

      <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
          <option selected hidden disabled>--Pilih Jenis Kelamin--</option>
          <option value="Laki-Laki">Laki-Laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
        <?php echo form_error('jenis_kelamin', '<div class="text-small text-danger"> </div>') ?>
      </div>
      <div class="form-group">
        <label>Pendidikan</label>
        <select name="pendidikan" class="form-control">
          <option selected hidden disabled>--Pilih Pendidikan--</option>
          <?php foreach ($pendidikan as $pd) : ?>
            <option value="<?php echo $pd->tingkat_pendidikan ?>"><?php echo $pd->tingkat_pendidikan ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label>Agama</label>
        <select name="agama" class="form-control">
          <option selected hidden disabled>--Pilih Agama--</option>
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Katolik">Katolik</option>
          <option value="Hindu">Hindu</option>
          <option value="Buddha">Buddha</option>
          <option value="Konghucu">Konghucu</option>
          <option value="Lainnya">Lainnya</option>
        </select>
        <?php echo form_error('agama', '<div class="text-small text-danger"> </div>') ?>
      </div>
      <div class="form-group">
        <label>Pangkat</label>
        <input type="text" name="pangkat" class="form-control">
        <?php echo form_error('pangkat', '<div class="text-small text-danger"> </div>') ?>
      </div>
      <div class="form-group">
        <label>Nomor Pengangkatan</label>
        <input type="number" name="no_pengangkatan" class="form-control">
        <?php echo form_error('no_pengangkatan', '<div class="text-small text-danger"> </div>') ?>
      </div>
      <div class="form-group">
        <label>Tanggal Pengangkatan</label>
        <input type="date" name="tgl_pengangkatan" class="form-control">
        <?php echo form_error('tgl_pengangkatan', '<div class="text-small text-danger"> </div>') ?>
      </div>
      <div class="form-group">
        <label>Nomor Pemberhentian</label>
        <input type="number" name="no_pemberhentian" class="form-control">
        <?php echo form_error('no_pemberhentian', '<div class="text-small text-danger"> </div>') ?>
      </div>
      <div class="form-group">
        <label>Tanggal Pemberhentian</label>
        <input type="date" name="tgl_pemberhentian" class="form-control">
        <?php echo form_error('tgl_pemberhentian', '<div class="text-small text-danger"> </div>') ?>
      </div>
      <div class="form-group">
        <label>Jabatan</label>
        <select name="jabatan" class="form-control">
          <option selected hidden disabled>--Pilih Jabatan--</option>
          <?php foreach ($jabatan as $j) : ?>
            <option value="<?php echo $j->nama_jabatan ?>"><?php echo $j->nama_jabatan ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <?php echo form_error('jabatan', '<div class="text-small text-danger"> </div>') ?>
      <div class="form-group">
        <label>Masa Jabatan</label>
        <input type="text" name="masa_jabatan" class="form-control">
        <?php echo form_error('masa_jabatan', '<div class="text-small text-danger"> </div>') ?>
      </div>
      <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
          <option selected hidden disabled>--Pilih Status--</option>
          <option value="Aktif">Aktif</option>
          <option value="Non-Aktif">Non-Aktif</option>
        </select>
        <?php echo form_error('status', '<div class="text-small text-danger"> </div>') ?>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
        <?php echo form_error('password', '<div class="text-small text-danger"> </div>') ?>
      </div>
      <div class="form-group">
        <label>Hak Akses</label>
        <select name="hak_akses" class="form-control">
          <option selected hidden disabled>--Pilih Hak Akses--</option>
          <?php foreach ($hak_akses as $hk) : ?>
            <option value="<?php echo $hk->keterangan ?>"><?php echo $hk->keterangan ?></option>
          <?php endforeach; ?>
        </select>
      </div>


      <div class="form-group">
        <label>Photo</label>
        <input type="file" name="photo" class="form-control">
      </div>


      <button type="submit" class="btn btn-success">Simpan</button>
      <button type="reset" class="btn btn-danger">Reset</button>
      <a href="<?php echo base_url('admin/data_perangkat') ?>" class="btn btn-warning">Kembali</a>
  </div>

  </form>
</div>
</div>