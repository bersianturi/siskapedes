<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/data_perangkat/tambah_data') ?>"><i class="fas fa-plus"></i> Tambah Data Perangkat Desa</a>
  <?php echo $this->session->flashdata('pesan') ?>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="">
        <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Photo</th>
              <th class="text-center">Nama Lengkap</th>
              <th class="text-center">Gelar Depan</th>
              <th class="text-center">Gelar Belakang</th>
              <th class="text-center">Nomor Induk Kependudukan</th>
              <th class="text-center">Tempat Lahir</th>
              <th class="text-center">Tanggal Lahir</th>
              <th class="text-center">Usia</th>
              <th class="text-center">Sisa Pensiun</th>
              <th class="text-center">Jenis Kelamin</th>
              <th class="text-center">Pendidikan</th>
              <th class="text-center">Agama</th>
              <th class="text-center">Pangkat</th>
              <th class="text-center">Nomor Pengangkatan</th>
              <th class="text-center">Tanggal Pengangkatan</th>
              <th class="text-center">Nomor Pemberhentian</th>
              <th class="text-center">Tanggal Pemberhentian</th>
              <th class="text-center">Jabatan</th>
              <th class="text-center">Masa Jabatan</th>
              <th class="text-center">Status</th>
              <th class="text-center">Password</th>
              <th class="text-center">Hak Akses</th>
              <th class="text-center">Verifikasi Data</th>
              <th class="text-center"><i class='fa fa-gear' aria-hidden='true'></i></th>

            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($pegawai as $p) : ?>
              <tr>
                <td class="text-center"><?php echo $no++ ?></td>

                </td>

                <td><img src="<?php echo base_url() . 'photo/' . $p->photo ?>" width="50px"></td>
                <td class="text-center">
                  <?php echo $p->nama_perangkat ?>
                </td>
                <td class="text-center"><?php echo $p->gelar_depan ?></td>
                <td class="text-center"><?php echo $p->gelar_belakang ?></td>
                <td class="text-center"><?php echo $p->nik ?></td>
                <td class="text-center"><?php echo $p->tempat_lahir ?></td>
                <td class="text-center"><?php echo date('d-m-Y', strtotime($p->tgl_lahir)) ?></td>
                <td class="text-center"><?php echo DateTime::createFromFormat('Y-m-d', $p->tgl_lahir)->diff(new DateTime('now'))->y . ' tahun'; ?></td>
                <td class="text-center"><?php echo 60 - ((int)DateTime::createFromFormat('Y-m-d', $p->tgl_lahir)->diff(new DateTime('now'))->y) . ' tahun'; ?></td>
                <td class="text-center"><?php echo $p->jenis_kelamin ?></td>
                <td class="text-center"><?php echo $p->pendidikan ?></td>
                <td class="text-center"><?php echo $p->agama ?></td>
                <td class="text-center"><?php echo $p->pangkat ?></td>
                <td class="text-center"><?php if ($p->no_pengangkatan == '0') {
                                          echo '';
                                        } else {
                                          $p->no_pengangkatan;
                                        } ?></td>
                <td class="text-center"><?php if ($p->tgl_pengangkatan == '0000-00-00') {
                                          echo '';
                                        } else {
                                          echo date('d-m-Y', strtotime($p->tgl_pengangkatan));
                                        } ?></td>
                <td class="text-center"><?php if ($p->no_pemberhentian == '0') {
                                          echo '';
                                        } else {
                                          $p->no_pemberhentian;
                                        } ?></td>
                <td class="text-center"><?php if ($p->tgl_pemberhentian == '0000-00-00') {
                                          echo '';
                                        } else {
                                          echo date('d-m-Y', strtotime($p->tgl_pemberhentian));
                                        } ?></td>
                <td class="text-center"><?php echo $p->jabatan ?></td>
                <td class="text-center"><?php echo $p->masa_jabatan ?></td>
                <td class="text-center"><?php echo $p->status ?></td>
                <td class="text-center"><?php echo $p->password ?></td>
                <td class="text-center"><?php if ($p->hak_akses == '1') {
                                          echo "Admin";
                                        } else if ($p->hak_akses == '2') {
                                          echo "Dinpermasdes";
                                        } else if ($p->hak_akses == '3') {
                                          echo "Perangkat Desa";
                                        } else {
                                          echo "Super Admin";
                                        }
                                        ?></td>

                <td class="text-center">
                  <?php
                  if ($p->verifikasi_data == 'belum_disetujui') {
                    echo "Belum Disetujui <a href='data_perangkat/update_verifikasi_disetujui/$p->id_perangkat' class='btn btn-success btn-sm data-popup='tooltip' data-placement='top' title='Disetujui'><i class='fa fa-check' aria-hidden='true'></i></i></a> <a href='data_perangkat/update_verifikasi_ditolak/$p->id_perangkat' class='btn btn-danger btn-sm data-popup='tooltip' data-placement='top' title='Ditolak Data'><i class='fa fa-times' aria-hidden='true'></i></i></a>";
                  } else if ($p->verifikasi_data == 'disetujui') {
                    echo "Disetujui <a href='data_perangkat/update_verifikasi_ditolak/$p->id_perangkat' class='btn btn-danger btn-sm data-popup='tooltip' data-placement='top' title='Ditolak Data'><i class='fa fa-times' aria-hidden='true'></i></i></a>";
                  } else if ($p->verifikasi_data == 'ditolak') {
                    echo "Ditolak <a href='data_perangkat/update_verifikasi_disetujui/$p->id_perangkat' class='btn btn-success btn-sm data-popup='tooltip' data-placement='top' title='Disetujui'><i class='fa fa-check' aria-hidden='true'></i></i></a>";
                  }
                  ?>

                <td class="text-center">
                  <div class="btn-group">
                    <a class="btn btn-sm btn-info" href="<?php echo base_url('admin/data_perangkat/update_data/' . $p->id_perangkat) ?>"><i class="fa fa-pen"></i></a>
                    <a class="btn btn-sm btn-dark" href="<?php echo base_url('admin/data_perangkat/ganti_password/' . $p->id_perangkat) ?>"><i class="fa fa-key"></i></a>
                    <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/data_perangkat/delete_data/' . $p->id_perangkat) ?>"><i class="fa fa-trash"></i></a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>