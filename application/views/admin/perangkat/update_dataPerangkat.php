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

		<?php foreach ($perangkat as $row) : ?>
			<form method="POST" action="<?php echo base_url('admin/data_perangkat/update_data_aksi') ?>" enctype="multipart/form-data">
				<?= form_error(); ?>
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="hidden" name="id_perangkat" class="form-control" value="<?php echo $row->id_perangkat ?>">
					<input type="text" name="nama_perangkat" class="form-control" value="<?php echo $row->nama_perangkat ?>">
					<?php echo form_error('nama_perangkat', '<div class="text-small text-danger"> </div>') ?>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="mb-3">
							<label>Gelar Depan</label>
							<input class="form-control" id="gelar_depan" type="text" name="gelar_depan" value="<?php echo $row->gelar_depan ?>">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="mb-3">
							<label>Gelar Belakang</label>
							<input class="form-control" id="gelar_belakang" type="text" name="gelar_belakang" value="<?php echo $row->gelar_belakang ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Nomor Induk Kependudukan</label>
					<input type="number" name="nik" class="form-control" value="<?php echo $row->nik ?>" min="0">
					<?php echo form_error('nik', '<div class="text-small text-danger"> </div>') ?>
				</div>

				<div class="form-group">
					<label>Tempat Lahir</label>
					<input type="text" name="tempat_lahir" class="form-control" value="<?php echo $row->tempat_lahir ?>">
					<?php echo form_error('tempat_lahir', '<div class="text-small text-danger"> </div>') ?>
				</div>
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="date" name="tgl_lahir" class="form-control" value="<?php echo $row->tgl_lahir ?>">
					<?php echo form_error('tgl_lahir', '<div class="text-small text-danger"> </div>') ?>
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jenis_kelamin" class="form-control">
						<option value="Laki-Laki" <?php if ($row->jenis_kelamin == 'Laki-Laki') {
														echo 'selected';
													} ?>>Laki-Laki</option>
						<option value="Perempuan" <?php if ($row->jenis_kelamin == 'Perempuan') {
														echo 'selected';
													} ?>>Perempuan</option>
					</select>
					<?php echo form_error('jenis_kelamin', '<div class="text-small text-danger"> </div>') ?>
				</div>
				<div class="mb-3">
					<label for="pendidikan">Pendidikan</label>
					<select name="pendidikan" class="form-control">
						<option disabled hidden>--Pilih Pendidikan--</option>
						<?php foreach ($pendidikan as $pd) { ?>
							<option value="<?php echo $pd->tingkat_pendidikan ?>" <?php if ($row->pendidikan == $pd->tingkat_pendidikan) {
																						echo 'selected';
																					} ?>><?php echo $pd->tingkat_pendidikan ?></option>
						<?php } ?>
					</select>
				</div>

				<div class="form-group">
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
				<div class="form-group">
					<label>Pangkat</label>
					<input type="text" name="pangkat" class="form-control" value="<?php echo $row->pangkat ?>">
					<?php echo form_error('pangkat', '<div class="text-small text-danger"> </div>') ?>
				</div>
				<div class="form-group">
					<label>Nomor Pengangkatan</label>
					<input type="number" name="no_pengangkatan" class="form-control" value="<?php echo $row->no_pengangkatan ?>">
					<?php echo form_error('no_pengangkatan', '<div class="text-small text-danger"> </div>') ?>
				</div>
				<div class="form-group">
					<label>Tanggal Pengangkatan</label>
					<input type="date" name="tgl_pengangkatan" class="form-control" value="<?php echo $row->tgl_pengangkatan ?>">
					<?php echo form_error('tgl_pengangkatan', '<div class="text-small text-danger"> </div>') ?>
				</div>
				<div class="form-group">
					<label>Nomor Pemberhentian</label>
					<input type="number" name="no_pemberhentian" class="form-control" value="<?php echo $row->no_pemberhentian ?>">
					<?php echo form_error('no_pemberhentian', '<div class="text-small text-danger"> </div>') ?>
				</div>
				<div class="form-group">
					<label>Tanggal Pemberhentian</label>
					<input type="date" name="tgl_pemberhentian" class="form-control" value="<?php echo $row->tgl_pemberhentian ?>">
					<?php echo form_error('tgl_pemberhentian', '<div class="text-small text-danger"> </div>') ?>
				</div>
				<div class="mb-3">
					<label for="jabatan">Jabatan</label>
					<select name="jabatan" class="form-control">
						<option value="">--Pilih Jabatan--</option>
						<?php foreach ($jabatan as $j) { ?>
							<option value="<?php echo $j->nama_jabatan ?>" <?php if ($row->jabatan == $j->nama_jabatan) {
																				echo 'selected';
																			} ?>><?php echo $j->nama_jabatan ?></option>
						<?php } ?>
					</select>

				</div>

				<div class="form-group">
					<label>Masa Jabatan</label>
					<input type="text" name="masa_jabatan" class="form-control" value="<?php echo $row->masa_jabatan ?>">
					<?php echo form_error('masa_jabatan', '<div class="text-small text-danger"> </div>') ?>
				</div>
				<div class="form-group">
					<label>Status</label>
					<select name="status" class="form-control">
						<option value="Aktif" <?php if ($row->status == 'Aktif') {
													echo 'selected';
												} ?>>Aktif</option>
						<option value="Non-Aktif" <?php if ($row->status == 'Non-Aktif') {
														echo 'selected';
													} ?>>Non-Aktif</option>
					</select>
					<?php echo form_error('status', '<div class="text-small text-danger"> </div>') ?>
				</div>
				<div class="form-group">
					<label>Hak Akses</label>
					<select name="hak_akses" class="form-control">
						<option selected hidden disabled>--Pilih Hak Akses--</option>
						<?php foreach ($hak_akses as $hk) : ?>
							<option value="<?php echo $hk->hak_akses ?>" <?php if ($row->hak_akses == $hk->hak_akses) {
																				echo 'selected';
																			} ?>><?php echo $hk->keterangan ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group mb-4">
					<label>Photo</label>
					<input type="hidden" name="old_photo" value="<?php echo $row->photo ?>">
					<input type="file" name="photo" class="form-control-file">
				</div>

				<button type="submit" class="btn btn-success">Simpan</button>
				<a href="<?php echo base_url('admin/data_perangkat') ?>" class="btn btn-danger">Kembali</a>

			</form>
		<?php endforeach; ?>
	</div>
</div>