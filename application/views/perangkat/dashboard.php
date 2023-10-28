<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <?php foreach ($perangkat as $p) : ?>
            <div class="col-xl-4">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Foto</div>
                    <div class="card-body text-center">
                        <img class="rounded-circle mb-2" style="height: 10rem;" src="<?php echo base_url('photo/' . $p->photo) ?>"></img>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header">Data Perangkat Desa</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td class="border-top-0" width="40%">Nama Perangkat Desa</td>
                                <td class="border-top-0" width="1%">:</td>
                                <td class="border-top-0"><?php echo $p->nama_perangkat ?></td>
                            </tr>

                            <tr>
                                <td width="40%">Gelar Depan</td>
                                <td width="1%">:</td>
                                <td><?php echo $p->gelar_depan ?></td>
                            </tr>

                            <tr>
                                <td width="40%">Gelar Belakang</td>
                                <td width="1%">:</td>
                                <td><?php echo $p->gelar_belakang ?></td>
                            </tr>

                            <tr>
                                <td width="40%">Nomor Induk Kependudukan</td>
                                <td width="1%">:</td>
                                <td><?php echo $p->nik ?></td>
                            </tr>

                            <tr>
                                <td width="40%">Tempat Lahir</td>
                                <td width="1%">:</td>
                                <td><?php echo $p->tempat_lahir ?></td>
                            </tr>

                            <tr>
                                <td width="40%">Tanggal Lahir</td>
                                <td width="1%">:</td>
                                <td><?php echo $p->tgl_lahir ?></td>
                            </tr>

                            <tr>
                                <td width="40%">Jenis Kelamin</td>
                                <td width="1%">:</td>
                                <td><?php echo $p->jenis_kelamin ?></td>
                            </tr>

                            <tr>
                                <td width="40%">Pendidikan</td>
                                <td width="1%">:</td>
                                <td><?php echo $p->pendidikan ?></td>
                            </tr>

                            <tr>
                                <td width="40%">Agama</td>
                                <td width="1%">:</td>
                                <td><?php echo $p->agama ?></td>
                            </tr>

                            <tr>
                                <td width="40%">Pangkat/Golongan</td>
                                <td width="1%">:</td>
                                <td><?php echo $p->pangkat ?></td>
                            </tr>

                            <tr>
                                <td width="40%">Nomor Keputusan Pengangkatan</td>
                                <td width="1%">:</td>
                                <td><?php echo $p->no_pengangkatan ?></td>
                            </tr>

                            <tr>
                                <td width="40%">Tanggal Keputusan Pengangkatan</td>
                                <td width="1%">:</td>
                                <td><?php echo $p->tgl_pengangkatan ?></td>
                            </tr>

                            <tr>
                                <td width="40%">Nomor Keputusan Pemberhentian</td>
                                <td width="1%">:</td>
                                <td><?php echo $p->no_pemberhentian ?></td>
                            </tr>

                            <tr>
                                <td width="40%">Tanggal Keputusan Pemberhentian</td>
                                <td width="1%">:</td>
                                <td><?php echo $p->tgl_pemberhentian ?></td>
                            </tr>

                            <tr>
                                <td width="40%">Jabatan</td>
                                <td width="1%">:</td>
                                <td><?php echo $p->jabatan ?></td>
                            </tr>

                            <tr>
                                <td width="40%">Masa Jabatan</td>
                                <td width="1%">:</td>
                                <td><?php echo $p->masa_jabatan ?></td>
                            </tr>

                            <tr>
                                <td width="40%">Status Perangkat Desa</td>
                                <td width="1%">:</td>
                                <td><?php echo $p->status ?></td>
                            </tr>

                        </table>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <!-- <div class="card" style="margin-bottom: 120px;">
            <div class="card-header font-weight-bold bg-primary text-white">
                Data Perangkat Desa
            </div>

            
                <div class="card-body">
                    <div class="row">
                        <div class="mx-3 col-4">
                            <img  src="<?php echo base_url('photo/' . $p->photo) ?>">
                        </div>
                        <div class="col-8">
                            
                        </div>
                    </div>
                </div>
            

        </div> -->
    </div>
    <!-- /.container-fluid -->