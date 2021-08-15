<?php

require 'page/koneksi.php';

//ambil data di url
$id_penyakit=$_GET["id"];

//query data berdasarkan id
$kt = query("SELECT * FROM penyakit WHERE id_penyakit=$id_penyakit")[0];


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Pakar Metabolik</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bethany - v2.2.1
  * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center">
        <div class="logo mr-auto">
          <h1 class="text-light"><a href="index.html"><span>Sistem Pakar</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="active"><a href="index.php">Beranda</a></li>
            <li><a href="index.php#why-us">Informasi Penyakit</a></li>
            <li><a href="index.php#services">Informasi Bahan Makanan</a></li>
            <li><a href="index.php#about">Tentang Website</a></li>
            <li><a href="index.php#contact">Kontak</a></li>
            <li class="get-started"><a href="login/login.php">Konsultasi</a></li>
          </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Detail Penyakit</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Detail Penyakit</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="portfolio-details-container" data-aos="fade-up" data-aos-delay="100">

          <div class="owl-carousel portfolio-details-carousel">
            <td> <?= "<img src='img/$kt[gambar]' >" ?> </td>
          </div>

          <div class="portfolio-info">
            <h3>Informasi Penyakit</h3>
            <form action="" method="post" enctype="multipart/form-data">
            <ul>
              <li><strong>Nama Penyakit</strong>: <?= $kt["nama_penyakit"];?> </li>
              <li><strong>Kode Penyakit</strong>: <?= $kt["kode_penyakit"]; ?> </li>
            </ul>
            </form>
          </div>

        </div>

        <div class="rowfd">
          <div class="portfolio-description">
            <h2>Penyakit <?= $kt["nama_penyakit"];?></h2>
            <div class="text-justify">
              <?= $kt["keterangan"];?>  <p>
            </div>
          </div>
        </div>
        <div class="row rowfd">
          <div class="col-5">
            <div class="text-justify">
              <h4>Penyebab : </h4>
              <?= $kt["penyebab"];?>  <p>
            </div>
          </div>
          <div class="col-2"></div>
          <div class="col-5">
            <div class="text-justify">
              <h4>Solusi : </h4>
              <?= $kt["solusi"];?>  <p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-md-flex py-4">
      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
           <strong><span>Sistem Pakar Metabolik</span></strong>
        </div>
        <div class="credits">
           <p> By. Fadihah Fitri N </p>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>