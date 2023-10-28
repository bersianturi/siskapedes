<div class="app-main" id="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 m-b-30">
                <?= form_error(); ?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-purple">Filter Data Perangkat</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo base_url('superadmin/data_perangkat') ?>">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama Kecamatan</label>
                                    <select name="kecamatan" class="form-control">
                                        <option selected disabled hidden>-- Pilih Nama Kecamatan --</option>
                                        <?php foreach ($kecamatan as $k) { ?>
                                            <option value="<?= $k->id_kecamatan ?>"><?= $k->nama_kecamatan ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('kecamatan'); ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Nama Desa</label>
                                    <select name="desa" class="form-control">
                                        <option selected disabled hidden>--Pilih Nama Desa--</option>
                                        <?php foreach ($desa as $d) { ?>
                                            <option value="<?= $d->id_desa ?>"><?= $d->nama_desa ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('desa'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary mt-2"><i class="fa fa-search"></i> Filter Data</button>
                            <a class="btn btn-sm btn-info mt-2" target="_blank" href="<?php echo base_url() . 'superadmin/data_perangkat/export/?kecamatan=' . set_value('kecamatan') . '&desa=' . set_value('desa') ?>"><i class="fa fa-file-excel-o"></i> Eksport Data Perangkat</a>
                        </form>
                        <div class="border-top my-4"></div>
                        <h4 class="card-title text-purple">Hasil Pencarian Data Perangkat</h4>
                        <div class="">
                            <table class="table table-bordered table-striped table-responsive mt-3">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Lengkap</th>
                                    <th class="text-center">Gelar Depan</th>
                                    <th class="text-center">Gelar Belakang</th>
                                    <th class="text-center">Nomor Induk Kependudukan</th>
                                    <th class="text-center">Tempat Lahir</th>
                                    <th class="text-center">Tanggal Lahir</th>
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
                                    <!--<th class="text-center">Hak Akses</th>-->
                                    <th class="text-center">Hak Akses</th>
                                    <!--<th class="text-center">Desa</th>-->
                                    <th class="text-center"></th>
                                </tr>

                                <?php $no = 1;
                                foreach ($perangkat as $p) : ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no ?></td>
                                        <td class="text-center"><?php echo $p->nama_perangkat ?></td>
                                        <td class="text-center"><?php echo $p->gelar_depan ?></td>
                                        <td class="text-center"><?php echo $p->gelar_belakang ?></td>
                                        <td class="text-center"><?php echo $p->nik ?></td>
                                        <td class="text-center"><?php echo $p->tempat_lahir ?></td>
                                        <td class="text-center"><?php echo $p->tgl_lahir ?></td>
                                        <td class="text-center"><?php echo $p->jenis_kelamin ?></td>
                                        <td class="text-center"><?php echo $p->pendidikan ?></td>
                                        <td class="text-center"><?php echo $p->agama ?></td>
                                        <td class="text-center"><?php echo $p->pangkat ?></td>
                                        <td class="text-center"><?php echo $p->no_pengangkatan ?></td>
                                        <td class="text-center"><?php echo $p->tgl_pengangkatan ?></td>
                                        <td class="text-center"><?php echo $p->no_pemberhentian ?></td>
                                        <td class="text-center"><?php echo $p->tgl_pemberhentian ?></td>
                                        <td class="text-center"><?php echo $p->jabatan ?></td>
                                        <td class="text-center"><?php echo $p->masa_jabatan ?></td>
                                        <td class="text-center"><?php echo $p->status ?></td>
                                        <td class="text-center"><?php echo $p->password ?></td>
                                        <!--<td class="text-center"><?php echo $p->hak_akses ?></td>-->
                                        <?php if ($p->hak_akses == '1') { ?>
                                            <td>Admin</td>
                                        <?php } else { ?>
                                            <td>Perangkat</td>
                                        <?php } ?>
                                        <!-- <td><img src="<?php echo base_url() . 'photo/' . $p->photo ?>" width="50px"></td> -->

                                        <td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end real estate contant -->
    </div>
    <!-- end container-fluid -->
</div>
<!-- end app-main -->
</div>
<!-- end app-container -->