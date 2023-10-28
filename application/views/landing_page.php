<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>PENDATAAN PERANGKAT DESA</title>
   <!-- StyleSheets -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/bootstrap/bootstrap.min.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/fontawesome/css/all.min.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/style.css" />
</head>

<body>
   <!-- Pre Loader -->
   <div class="Loader" id="Loader">
      <div class="LoaderWrapper">
         <div class="circleBall"></div>
         <div class="circleBall"></div>
         <div class="circleBall"></div>
      </div>
   </div>
   <!-- Go to top Button -->
   <a href="#Home">
      <div class="Gototop">
         <i class="fa fa-angle-double-up text-white" aria-hidden="true"></i>
      </div>
   </a>
   <!-- Header Section -->
   <div class="Header" id="Home">
      <nav class="navbar fixed-top">
         <img src="assets/landing/img/purbalingga.png" height="56px">
         <div class="container">
            <a class="navbar-brand" href="#">
               SISKAPEDES
            </a>
            <div class="collapse_menu deactive">
               <i class="fa fa-bars" aria-hidden="true"></i>
               <i class="fa fa-times" aria-hidden="true"></i>
               <ul class="nav">
                  <li class="nav-item">
                     <a class="nav-link" href="#Home">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#Tentang">Informasi</a>
                  </li>

                  <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url('login'); ?>">Login</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="banner">
         <!--<div class="layer">-->
         <div class="row Section">
            <div class="col">
               <div class="box">
                  <div>
                     <br><br><br><br><br><br>
                     <h2><b><i>SISTEM INFORMASI KEPALA DESA
                              DAN PERANGKAT DESA</i></b></h2>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.a</p>
               </div>
            </div>

            <div class="col headerImg">
               <img src="<?php echo base_url() ?>assets/landing/img/office.png" alt="">
            </div>
         </div>
      </div>
   </div>
   </div>

   <!-- Service Section -->
   <div class="Service" id="Tentang">
      <div class="Section">
         <!-- <div class="text-center">
            <h2><b>Informasi</b></h2>
            <p></p>
            <p></p>
            <div class="subHeading">
               Berikut informasi lebih lengkap tentang website <br>informasi pendataan perangkat desa </div>
         </div>

         <div class="content">
            <div class="row">
               <div class="col-md-6 col-lg-4 col-xl-3 ">
                  <div class="card">
                     <div class="CardImage"><img src="<?php echo base_url(); ?>assets/img/administrator.svg"></div>
                     <div class="body">
                        <div class="title mb-2">
                           <font size="4"><b><i>Tentang Website</font></b></i>
                        </div>
                        <div class="flip" id="flip1">
                           <font color="white">Baca Selengkapnya</font>
                        </div>
                        <div class="panel" id="panel1">aplikasi ini dibuat untuk membantu pemerintah dalam proses pemantauan data perangkat desa</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-6 col-lg-4 col-xl-3 ">
                  <div class="card">
                     <div class="CardImage"><img src="<?php echo base_url(); ?>assets/img/administrator.svg"></div>
                     <div class="body">
                        <div class="title mb-2">
                           <font size="4"><b><i>Informasi A</font></b></i>
                        </div>
                        <div class="flip" id="flip2">
                           <font color="white">Baca Selengkapnya</font>
                        </div>
                        <div class="panel" id="panel2">Deskripsi Informasi</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-6 col-lg-4 col-xl-3 ">
                  <div class="card">
                     <div class="CardImage"><img src="<?php echo base_url(); ?>assets/img/karyawan.svg"></div>
                     <div class="body">
                        <div class="title mb-2">
                           <font size="4"><b><i>Informasi B</font></b></i>
                        </div>
                        <div class="flip" id="flip3">
                           <font color="white">Baca Selengkapnya</font>
                        </div>
                        <div class="panel" id="panel3">Deskripsi Informasi</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-6 col-lg-4 col-xl-3 ">
                  <div class="card">
                     <div class="CardImage"><img src="<?php echo base_url(); ?>assets/img/others-fitur.svg"></div>
                     <div class="body">
                        <div class="title mb-2">
                           <font size="4"><b><i>Informasi Lainnya</font></b></i>
                        </div>
                        <div class="flip" id="flip4">
                           <font color="white">Baca Selengkapnya</font>
                        </div>
                        <div class="panel" id="panel4">Deskripsi Informasi</div>
                     </div>
                  </div>
               </div>
            </div>
         </div> -->
         <div class="text-center mb-3">
            <h3><b>Statistik SISKAPEDES</b></h3>
            <br>
         </div>
         <div class="row">
            <div class="col-xl-6 col-md-6 col-12">
               <div class="text-center mb-3">
                  <h3><b>Chart Jenis Kelamin</b></h3>
                  <br>
               </div>
               <canvas id="chart-jenis_kelamin"></canvas>
            </div>
            <div class="col-xl-6 col-md-6 col-12">
               <div class="text-center mb-3">
                  <h3><b>Chart Jabatan</b></h3>
                  <br>
               </div>
               <canvas id="chart-jabatan"></canvas>
            </div>
         </div>
      </div>
   </div>
   <!-- Team Section -->
   <div class="Team" id="AboutMe">
      <div class="Section">
         <div class="text-center">
            <h2><b>Tentang Kami</b></h2>
            <br>
         </div>
         <div class="content">
            <div class="team row">
               <div class="team-memeber col-md-6 col-lg-4 col-xl-3">
                  <div class="card">
                     <div class="TopImg">
                        <img src="<?php echo base_url(); ?>assets/img/kominfo.png" class="rounded-circle w-100 d-block">
                     </div>
                     <div class="TeamInfo text-center">
                        <div class="Name">SISKAPEDES</div>
                        <div class="Job">Dinas Komunikasi dan Informatika Kabupaten Purbalingga</div>
                        <div class="social_links">
                           <div class="social">
                              <a class="" href="https://www.github.com"><i class="fab fa-github" aria-hidden="true"></i></a>
                           </div>
                           <div class="social">
                              <a class="" href="https://www.instagram.com"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                           </div>
                           <div class="social">
                              <a class="" href="https://www.youtube.com"><i class="fab fa-youtube" aria-hidden="true"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Footer Section -->
   <div class="Footer" id="Footer">
      <div class="container">
         <div class="row">
            <div class="col-12 text-center my-3">
               Copyright &copy; Dinas Komunikasi dan Informatika | Purbalingga 2023 - All Rights Reserved
            </div>
         </div>
      </div>
   </div>
   <!-- Javascripts -->

   <script src="<?php echo base_url(); ?>assets/landing/js/jquery.js"></script>
   <script src="<?php echo base_url(); ?>assets/landing/js/bootstrap.js"></script>
   <script src="<?php echo base_url(); ?>assets/landing/js/script.js"></script>
   <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
   <script>
      $(document).ready(function() {
         $("#flip1").click(function() {
            $("#panel1").slideToggle("slow");
         });
      });
   </script>

   <script>
      $(document).ready(function() {
         $("#flip2").click(function() {
            $("#panel2").slideToggle("slow");
         });
      });
   </script>
   <script>
      $(document).ready(function() {
         $("#flip3").click(function() {
            $("#panel3").slideToggle("slow");
         });
      });
   </script>
   <script>
      $(document).ready(function() {
         $("#flip4").click(function() {
            $("#panel4").slideToggle("slow");
         });
      });
   </script>
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
      var ctx = document.getElementById("chart-jenis_kelamin");
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
      var ctx = document.getElementById("chart-jabatan");
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
</body>

</html>