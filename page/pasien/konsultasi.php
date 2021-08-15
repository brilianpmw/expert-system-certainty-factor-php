<?php

session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: ../../login/login_admin.php");
    exit;
}


require '../koneksi.php';

$sql = query("SELECT*FROM gejala");

$notfound=false;
$found=false;

if(isset($_POST['submit'])){ 
  $kode_gejala = $_POST['kode_gejala'];
  $jumlah_dipilih = count($kode_gejala);
  function array_equal($a, $b) {
    return (
         is_array($a) 
         && is_array($b) 
         && count($a) == count($b) 
         && array_diff($a, $b) === array_diff($b, $a)
    );
}
  $kode_result=[];
  $notfound =true;
  if ($jumlah_dipilih==0){
    echo "<script>alert('Gejala harus diceklist..!!')</script>";
  }else{ 
    $get_penyakit = query("SELECT * FROM penyakit");
   for ($i=0; $i < count($get_penyakit); $i++) { 
    $get_rule = query("SELECT kode_gejala,kode_penyakit from basispengetahuan where kode_penyakit='" . $get_penyakit[$i]["kode_penyakit"] . "'");
    $arr_gejala = [];
    for ($j=0; $j <count($get_rule) ; $j++) { 
      array_push($arr_gejala,$get_rule[$j]["kode_gejala"]);
    }
    if(array_equal($arr_gejala,$kode_gejala)){
      $found = true;
      $notfound=false;
      $kode_result = $get_penyakit[$i];
      tambah_result_konsultasi($_SESSION["id_user"],$get_penyakit[$i]["id_penyakit"]);
    }   
  }
  // echo $notfound;
  //   var_dump($kode_result);
  // die();

  
  }
  
}
 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Pakar Metabolik</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../vendor/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../vendor/assets/vendors/css/vendor.bundle.base.css">
    <!-- Layout styles -->
    <link rel="stylesheet" href="../vendor/assets/css/style.css">
    <!-- End layout styles -->
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"> <h3>SP METABOLIK</h3> </a>
          <a class="navbar-brand brand-logo-mini" href="index.html"> <h3>SPM</h3> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="../vendor/assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"> <?php echo $_SESSION["username"]; ?> </p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="../../login/logout.php">
                  <i class="mdi mdi-logout mr-2 text-primary"></i>Log Out </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="../vendor/assets/images/faces-clipart/pic-3.png" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"> <?php echo $_SESSION["username"]; ?> </span>
                  <span class="text-secondary text-small"> <?php echo $_SESSION["role"]; ?> </span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index_pasien.php">
                <span class="menu-title">Beranda</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bahan_makanan.php">
                <span class="menu-title">Bahan Makanan</span>
                <i class="mdi mdi-account-search menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="konsultasi.php">
                <span class="menu-title">Konsultasi</span>
                <i class="mdi mdi-account-search menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="riwayat_diagnosa.php?id=<?= $_SESSION["id_user"];?>">
                <span class="menu-title">Riwayat Diagnosa</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="edit_profil_pasien.php?id=<?= $_SESSION["id_user"];?>">
                <span class="menu-title">Lihat Profil</span>
                <i class="mdi mdi-autorenew menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-info text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body text-center">
                    <h4 class="card-title">Pilih Gejala yang Anda Rasakan</h4>
                    <hr>
                    <form action="konsultasi.php" method="post">
                    <blockquote class="blockquote">
                      <?php foreach($sql as $row) : ?>
                        <div class=" text-justify">
                          <div class="form-check form-check-info">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="kode_gejala[]" value="<?=$row["kode_gejala"] ?>"> <?= $row["nama_gejala"]; ?> </label>
                          </div>
                        </div>
                      <?php endforeach; ?>
                      </blockquote>
                     
                      <button type="submit" name="submit" class="btn btn-info">Cek Hasil</button>

<?php

$perintah = "SELECT  basispengetahuan.kode_penyakit, basispengetahuan.nama_gejala, basispengetahuan.mb, basispengetahuan.md
FROM penyakit, gejala, basispengetahuan
  WHERE penyakit.kode_penyakit=basispengetahuan.kode_penyakit
    AND gejala.kode_gejala=basispengetahuan.kode_gejala 
     ";
  $minta =mysqli_query($conn,$perintah);
	$sql = '';
	$i = 0;
  //mengecek semua chekbox gejala
  while($hs=mysqli_fetch_array($minta))
  {
    //jika gejala dipilih
    //menyusun daftar gejala misal '1','2','3' dst utk dipakai di query
    if ($_POST['gejala'.$hs['kode_gejala']] == 'true')
    {
      if ($sql == '')
      {
        $sql = "'$hs[kode_gejala]'";
      }
      else
      {
        $sql = $sql.",'$hs[kode_gejala]'";
      }
    }
    $i++;
  }

empty($daftar_penyakit);
empty($daftar_cf);
if($sql != '')
{
  //mencari kode penyakit di tabel basisdata yang gejalanya dipilih
  $perintah = "SELECT kode_penyakit FROM basispengetahuan WHERE kode_gejala IN ($row) GROUP BY kode_penyakit ORDER BY kode_penyakit";
  //echo "<br/>".$perintah."<br/>";
  $minta =mysqli_query($mysqli,$perintah);
  $kode_penyakit_terbesar = '';
  $nama_penyakit_terbesar = '';
  $c = 0;

  while($hs=mysqli_fetch_array($minta))
  {
    //memproses id penyakit satu persatu
    $kode_penyakit = $hs['kode_penyakit'];
    $qryi = "SELECT * FROM penyakit WHERE kode_penyakit = '$kode_penyakit'";
    $qry =mysqli_query($mysqli,$qryi);
    $dt = mysqli_fetch_array($qry);
    $nama_penyakit = $dt['nama_penyakit'];
    $daftar_penyakit[$c] = $hs['kode_penyakit'];
    $p = "SELECT kode_penyakit, mb, md, kode_gejala FROM basispengetahuan WHERE kode_gejala IN ($sql) AND kode_penyakit = '$kode_penyakit'";
    //echo $p.'<br/>';
    $m =mysqli_query($mysqli,$p);
    //mencari jumlah gejala yang ditemukan
    $jml = mysqli_num_rows($m);
    //jika gejalanya 1 langsung ketemu CF nya
    if ($jml == 1)
    {
      $h=mysqli_fetch_array($m);
      $mb = $h['mb'];
      $md = $h['md'];
      $cf = $mb - $md;
      $daftar_cf[$c] = $cf;
      //cek apakah penyakit ini adalah penyakit dgn CF terbesar ?
      if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf))
      {
        $cf_terbesar = $cf;
        $id_penyakit_terbesar = $kode_penyakit;
        $nama_penyakit_terbesar = $nama_penyakit;
      }
    //jika jumlah gejala cuma dua maka CF ketemu	
    }
    else if ($jml > 1)
    {
      $i = 1;
      //proses gejala satu persatu
      while($h=mysqli_fetch_array($m))
      {
        //pada gejala yang pertama masukkan MB dan MD menjadi MBlama dan MDlama
        if ($i == 1)
        {
          $mblama = $h['mb'];
          $mdlama = $h['md'];
          }
        //pada gejala yang nomor dua masukkan MB dan MD menjadi MBbaru dan MB baru kemudian hitung MBsementara dan MDsementara
        else if ($i == 2)
        {
          $mbbaru = $h['mb'];
          $mdbaru = $h['md'];
          $mbsementara = $mblama + ($mbbaru * (1 - $mblama));
          $mdsementara = $mdlama + ($mdbaru * (1 - $mdlama));
          //jika jumlah gejala cuma dua maka CF ketemu
          if ($jml == 2)
          {
            $mb = $mbsementara;
            $md = $mdsementara;
            $cf = $mb - $md;
            $daftar_cf[$c] = $cf;
            //cek apakah penyakit ini adalah penyakit dgn CF terbesar ?
            if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf))
            {
              $cf_terbesar = $cf;
              $id_penyakit_terbesar = $id_penyakit;
              $nama_penyakit_terbesar = $nama_penyakit;
            }
          }
        }
        //pada gejala yang ke 3 dst proses MBsementara dan MDsementara menjadi MBlama dan MDlama
			  //MB dan MD menjadi MBbaru dan MDbaru
				//hitung MBsementara dan MD sementara yg sekarang
				else if ($i >= 3)
				{
					$mblama = $mbsementara;
					$mdlama = $mdsementara;
					$mbbaru = $h['mb'];
					$mdbaru = $h['md'];
					$mbsementara = $mblama + ($mbbaru * (1 - $mblama));
					$mdsementara = $mdlama + ($mdbaru * (1 - $mdlama));
					//jika ini adalah gejala terakhir berarti CF ketemu
					if ($jml == $i)
					{
						$mb = $mbsementara;
						$md = $mdsementara;
						$cf = $mb - $md;
						$daftar_cf[$c] = $cf;
            //cek apakah penyakit ini adalah penyakit dgn CF terbesar ?
            if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf))
            {
              $cf_terbesar = $cf;
              $id_penyakit_terbesar = $kode_penyakit;
              $nama_penyakit_terbesar = $nama_penyakit;
            }
          }
        }
        $i++;
      }
      }
      $c++;
  }
}
//urutkan daftar gejala berdasarkan besar CF
for ($i = 0; $i < count($daftar_penyakit); $i++)
{
  for ($j = $i + 1; $j < count($daftar_penyakit); $j++)
  {
    if ($daftar_cf[$j] > $daftar_cf[$i])
    {
      $t = $daftar_cf[$i];
      $daftar_cf[$i] = $daftar_cf[$j];
      $daftar_cf[$j] = $t;

      $t = $daftar_penyakit[$i];
      $daftar_penyakit[$i] = $daftar_penyakit[$j];
      $daftar_penyakit[$j] = $t;
    }
  }
}

?>


                      
                    <div class="panel panel-info">
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->

                        <!-- result -->
                        
                        <!-- end result -->

          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"> <b>Sistem Pakar Metabolik</b> </span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> <a href="">By. Fadihah Fitri Nursasi</a> </span>
            </div>
          </footer>

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../vendor/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../vendor/assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../vendor/assets/js/off-canvas.js"></script>
    <script src="../vendor/assets/js/hoverable-collapse.js"></script>
    <script src="../vendor/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../vendor/assets/js/dashboard.js"></script>
    <script src="../vendor/assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>