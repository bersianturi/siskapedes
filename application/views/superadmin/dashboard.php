<!-- Begin Page Content -->
<div class="container-fluid">
    <?php echo $this->session->flashdata('pesan') ?>


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>

        <div id="date"></div>
        <script>
            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth();
            var year = date.getFullYear()

            document.getElementById("date").innerHTML = " " + day + " " + months[month] + " " + year;
        </script>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Kecamatan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_kecamatan ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Desa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_desa ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_perangkat ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-xl-6">
            <div class="card mb-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Chart Jenis Kelamin</h6>
                </div>
                <div class="card-body">
                    <canvas id="chart-jenis_kelamin-perangkat_desa" height="167">
                    </canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Chart Jabatan</h6>
                </div>
                <div class="card-body">
                    <canvas id="chart-jabatan-perangkat_desa" height="170">
                    </canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/js/Chart.js"></script>
    <?php
    $jenis_kelamin = "";
    $jumlah_perangkat = null;

    foreach ($perangkat_per_jenis_kelamin as $perangkat) {
        $jenis_kelamin .= "'$perangkat->jenis_kelamin'" . ",";
        $jumlah_perangkat .= "$perangkat->jumlah_perangkat" . ",";
    }
    ?>
    <script type="text/javascript">
        var ctx = document.getElementById("chart-jenis_kelamin-perangkat_desa");
        var myBarChart = new Chart(ctx, {
            type: "pie",
            data: {
                labels: [<?= $jenis_kelamin; ?>],
                datasets: [{
                    label: "Perangkat Desa",
                    backgroundColor: ["#4e73df", "#FF0000"],
                    data: [<?= $jumlah_perangkat; ?>],
                }, ],
            },
        });
    </script>
    <?php
    $jabatan = "";
    $jumlah_perangkat = null;

    foreach ($perangkat_per_jabatan as $perangkat) {
        $jabatan .= "'$perangkat->jabatan'" . ",";
        $jumlah_perangkat .= "$perangkat->jumlah_perangkat" . ",";
    }
    ?>
    <script type="text/javascript">
        var ctx = document.getElementById("chart-jabatan-perangkat_desa");
        var myBarChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: [<?= $jabatan; ?>],
                datasets: [{
                    label: "Perangkat Desa",
                    backgroundColor: "#4e73df",
                    data: [<?= $jumlah_perangkat; ?>],
                }, ],
            },
            options: {
                scales: {
                    xAxes: [{
                        ticks: {
                            autoSkip: false
                        },
                        gridLines: {
                            display: false,
                        },
                        barPercentage: 0.5
                    }, ],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            callback: function(val) {
                                return Number.isInteger(val) ? val : null;
                            }
                        },
                        gridLines: {
                            display: false,
                        },
                    }, ],
                },
                legend: {
                    display: false,
                },
            },
        });
    </script>