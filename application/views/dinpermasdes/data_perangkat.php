<div class="row">
    <div class="col-md-12 mb-2">
        <div class="alert border-0 alert-primary bg-gradient alert-dismissible fade show border-radius-none" role="alert">
            Silahkan pilih pencarian berdasarkan nama kecamatan dan desa.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="ti ti-close"></i>
            </button>
        </div>
        <!-- <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/data_perangkat/tambah_data') ?>"><i class="fas fa-plus"></i> Tambah Data Perangkat Desa</a> -->
    </div>
</div>

<div class="row">
    <div class="col-12 m-b-30">
        <div class="card card-statistics h-100 mb-0">
            <div class="card-header">
                <h4 class="card-title text-purple mb-0">Filter Data Perangkat</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="<?php echo base_url('dinpermasdes/dashboard') ?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nama Kecamatan</label>
                            <select name="kecamatan" class="form-control" id="kecamatan">
                                <option selected disabled hidden value="test">-- Pilih Nama Kecamatan --</option>
                                <?php foreach ($kecamatan as $k) { ?>
                                    <option value="<?= $k->id_kecamatan ?>"><?= $k->nama_kecamatan ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('kecamatan'); ?>
                        </div>
                        <div class="form-group col-6">
                            <label>Nama Desa</label>
                            <select name="desa" class="form-control" id="desa">
                                <option selected disabled hidden>--Pilih Nama Desa--</option>
                                <!--<?php foreach ($desa as $d) { ?>
                                    <option value="<?= $d->id_desa ?>"><?= $d->nama_desa ?></option>
                                <?php } ?> -->
                            </select>
                            <?= form_error('desa'); ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Filter Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end real estate contant -->
</div>
</div>

<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $("#kecamatan").change(function() {
        var id_kecamatan = $('#kecamatan').val();

        $.ajax({
            url: "<?= base_url('dinpermasdes/data_perangkat/get_desa') ?>",
            method: "POST",
            data: {
                id_kecamatan: id_kecamatan
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;

                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id_desa + '>' + data[i].nama_desa + '</option>';
                }

                $('#desa').html(html);
            }
        });
    });
</script>
<!-- end container-fluid -->

<!-- end app-container -->