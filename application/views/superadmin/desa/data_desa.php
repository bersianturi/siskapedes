<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>
    <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('superadmin/data_desa/tambah_data') ?>"><i class="fas fa-plus"></i> Tambah Data Desa</a>
    <?php echo $this->session->flashdata('pesan') ?>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="">
                <table class="table table-bordered" id="dataTable" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Desa</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Kecamatan</th>
                            <th class="text-center"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($desa as $d) : ?>
                            <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td class="text-center"><?php echo $d->nama_desa ?></td>
                                <td class="text-center"><?php echo $d->alamat_desa ?></td>
                                <td class="text-center"><?php echo $d->nama_kecamatan ?></td>
                                <!--<?php if ($d->$id_kecamatan == '1') { ?>
                                    <td>Kecamatan A</td>
                                <?php } else { ?>
                                    <td>Kecamatan B</td>
                                <?php } ?>-->
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-info" href="<?php echo base_url('superadmin/data_desa/update_data/' . $d->id_desa) ?>"><i class="fa fa-pen"></i></a>
                                        <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('superadmin/data_desa/delete_data/' . $d->id_desa) ?>"><i class="fa fa-trash"></i></a>
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