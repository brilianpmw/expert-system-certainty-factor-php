<?php

require 'login/config.php';
$dpenyakit=query("SELECT*FROM penyakit");

$jumlahdataperhalaman = 5;
$jumlahdata = count(query("SELECT*FROM bpangan"));
$jumlahhalaman = ceil($jumlahdata/$jumlahdataperhalaman);
$halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"]:1;
$awaldata = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;

$dbahan = query("SELECT*FROM bpangan ORDER BY nama_bahan asc LIMIT $awaldata, $jumlahdataperhalaman");

//tombol cari diklik
if ( isset($_POST["cari_bahan"]) ) {
  $dbahan=cari_bahan($_POST["keyword"]);
}

if(isset($_POST["submit"])) {
  if (tambah_pesan($_POST)>0) {
    echo "
          <script>
          alert('Pesan berhasil dikirimkan');
          document.location.href='index.php';
          </script>
         ";
  } else {
    echo "
          <script>
          alert('Pesan gagal dikirimkan');
          document.location.href='index.php';
          </script>
         ";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Pakar Metabolik</title>
  <style>
    .btn_fd{
      border: 1px solid #cecece;
      border-radius: 3px;
      padding: 3px 10px;
      box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
      color: white;
      background-color : #2D6187;
    }
    .btn_style:hover{
      border: 1px solid #b1b1b1;
      box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
    }
  </style>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            <li class="active"><a href="#header">Beranda</a></li>
            <li><a href="#why-us">Informasi Penyakit</a></li>
            <li><a href="#services">Informasi Bahan Makanan</a></li>
            <li><a href="#about">Tentang Website</a></li>
            <li><a href="#contact">Kontak</a></li>
            <li class="get-started"><a href="login/login.php">Konsultasi</a></li>
          </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1>Sistem Pakar Penyakit Metabolik</h1>
      <h2>Sistem Pakar untuk Diagnosa Penyakit Metabolik Menggunakan Metode Forward Chaining</h2>
      <a href="login/login.php" class="btn-get-started scrollto">Konsultasi</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container">
        <div class="row">
          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="100">
            <img src="" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-right">
            <div class="content">
              <h3>Apa itu penyakit Metabolik ?</h3><br>
              <div class="text-justify">
              <p> Penyakit Metabolik adalah penyakit yang berkaitan dengan peningkatan usia seperti hipertensi, diabetes melitus, kolesterol, asam urat, obesitas, dislipidemia dan malnutrisi. Penyakit metabolik timbul karena adanya gangguan pada metabolisme normal, proses pengubahan makanan menjadi energi pada tingkat sel. </p>
              <p>Penyakit metabolik mempengaruhi kemampuan sel untuk melakukan reaksi biokimia secara kritis yang melibatkan pemrosesan atau pengangkutan protein (asam amino), karbohidrat (gula dan pati) atau lipid (asam lemak). </p>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
              <?php foreach($dpenyakit as $row) : ?>
                <div class="col-xl-4 mt-3" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon-box mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4> <a href="detail.php?id=<?=$row["id_penyakit"]; ?>"> <?= $row["nama_penyakit"]; ?> </a> </h4>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div><!-- End .content-->
          </div>
        </div>
      </div>
    </section>
    <!-- End Why Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="row">
          <div class="col-lg-12">
            <div class="section-title" data-aos="fade-right">
              <h2>Informasi Bahan Makanan</h2>
            </div>
          </div>

          <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand"></a>
              <form class="form-inline" action="" method="post">
                <input class="form-control mr-sm-2" type="text" placeholder="Cari Nama bahan.." name="keyword"  autocomplete="off" autofocus>
                <button type="submit" name="cari_bahan" class="btn_fd" >Cari</button>
              </form>
            </div>
          </nav><br><br><br>

          <table class="table table-bordered">
            <tr class="text-center text-light" style="background-color:#2D6187;">
              <th>No.</th>
              <th>Nama Bahan</th>
              <th>Kalori</th>
              <th>Lemak</th>
              <th>Karbohidrat</th>
              <th>Protein</th>
              <th>Detail</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach($dbahan as $row) : ?>
            <tr class="text-center">
              <td><?= $i; ?></td>
              <td><?= $row["nama_bahan"];?> </td>
              <td><?= $row["kalori"];?> </td>
              <td><?= $row["lemak"];?> </td>
              <td><?= $row["karbohidrat"];?> </td>
              <td><?= $row["protein"];?> </td>
              <td>
                <a href="dbahan.php?id=<?= $row["id_bahan"];?>">Detail</a>
              </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
          </table>

          <div class="container">
                          <div class="row">
                            <div class="col-md-6 offset-md-5">
                              <nav aria-label="Page navigation example">
                                <ul class="pagination">                                  
                                  <li class="page-item">
                                    <?php if($halamanaktif>1) :?>
                                      <a class="page-link" href="?halaman=<?= $halamanaktif-1; ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                      </a>
                                    <?php endif ;?>
                                    <?php for($i=1; $i<=$jumlahhalaman; $i++) :?>
                                    <?php if($i==$halamanaktif) : ?>
                                      <a class="page-link" href="?halaman=<?= $i;?>" style="font-weight: bold; color: grey;"> <?= $i; ?> </a>
                                    <?php else :?>
                                      <li class="page-item"><a class="page-link" href="?halaman=<?= $i;?>"> <?= $i; ?> </a></li>
                                        <?php endif; ?>
                                        <?php endfor; ?>
                                      </li>
                                      <li class="page-item">
                                        <?php if($halamanaktif<$jumlahhalaman) :?>
                                        <a class="page-link" href="?halaman=<?= $halamanaktif+1; ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        </a>
                                        <?php endif ;?>
                                    </li>
                                  </ul>
                              </nav>
                            </div>
                          </div>
                        </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">
        <div class="row counters">
        </div>
      </div>
    </section>
    <!-- End Counts Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <h2>Sistem Pakar Diagnosa Penyakit Metabolik</h2>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 text-justify" data-aos="fade-left" data-aos-delay="200">
            <p>
              Website ini merupakan website sistem pakar untuk diagnosa penyakit metabolik,
              diantaranya yaitu Asam Urat, Diabetes, Hipertensi, Kolesterol dan Obesitas
            </p>
            <p>
              Dengan menerapkan pengetahuan yang diberikan langsung oleh ahlinya (dokter)
              melalui tahapan wawancara dan studi pustaka. Sehingga website ini dapat
              melakukan diagnosa penyakit berdasarkan gejala yang dialami oleh pasien. 
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i>Dapat Mendiagnosa penyakit Asam Urat, Diabetes, Hipertensi, Kolesterol dan Obesitas</li>
              <li><i class="ri-check-double-line"></i>Pengumpulan data dilakukan melalui wawancara dan studi pustaka</li>
              <li><i class="ri-check-double-line"></i>Menggunakan Metode Forward Chaining</li>
            </ul>
          </div>
        </div>

      </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center" data-aos="zoom-in">
          <h3>Panduan Penggunaan Website</h3><br>
          <p>* <b>Mencari Informasi mengenai Penyakit</b> - Klik menu "Informasi Penyakit".</p>
          <p>* <b>Memberi Saran, Masukan atau Pesan</b> - Klik menu "Kontak".</p>
          <p>* <b>Melakukan Diagnosa</b> - Klik menu "Konsultasi".</p>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <div class="section-title">
              <h2>Kontak</h2>
            </div>
          </div>

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
            <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2429569602464!2d106.61621099999999!3d-6.231668599999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fc1acf84837d%3A0x6642a0008730b471!2sUniversitas%20Gunadarma%20Kampus%20K!5e0!3m2!1sid!2sid!4v1619193795242!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
            <div class="info mt-4">
              <i class="icofont-google-map"></i>
              <h4>Lokasi:</h4>
              <p>Gunadarma Kampus K, Karawaci, Kelapa Dua</p>
            </div>
            <div class="row">
              <div class="col-lg-6 mt-4">
                <div class="info">
                  <i class="icofont-envelope"></i>
                  <h4>Email:</h4>
                  <p>spmetabolik@gmail.com</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="info w-100 mt-4">
                  <i class="icofont-phone"></i>
                  <h4>No Telp :</h4>
                  <p>+62 8121234567</p>
                </div>
              </div>
            </div>

            <form action="" method="post" enctype="multipart/form-data">
            <br>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" autocomplete="off" required> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email" autocomplete="off" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input type="subjek" name="subjek" id="subjek" class="form-control" placeholder="Masukkan Subjek" autocomplete="off" required>
              </div>         
              <div class="form-group">
                <textarea class="form-control" name="pesan" id="pesan" rows="5" placeholder="Masukan Pesan"></textarea>
              </div>
              <div class="text-center"><button type="submit" name="submit" class="btn_fd" >Kirim Pesan</button></div>
            </form>
          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-md-flex py-4">
      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong> | <span>Sistem Pakar Metabolik</span></strong>
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