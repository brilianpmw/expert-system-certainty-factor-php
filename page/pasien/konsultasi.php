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
$search = false;

if(isset($_POST['submit'])){ 
  $kode_gejala = $_POST['kode_gejala'];
  $jumlah_dipilih = count($kode_gejala);


  
  if ($jumlah_dipilih==0){
    echo "<script>alert('Gejala harus diceklist..!!')</script>";

  }else{    
    $search = true;

    $new_data = [];
     $list_disease = query("SELECT*FROM basispengetahuan where kode_gejala IN ('" . implode("','",$kode_gejala) . "')");
    for ($i=0; $i < count($list_disease); $i++) {
      $arr_gejala_uniq = [];
      $first = $list_disease[$i] ;
      $found = false;
      $index=-1;
      $joined=[];
      for ($j=0; $j <count($new_data) ; $j++) { 
        $check = $new_data[$j];
        if($check["kode_penyakit"] == $first['kode_penyakit']) {
          $found = true;
          $index = $j;
          array_push($arr_gejala_uniq,$first["kode_gejala"]);
          for ($l=0; $l < count($check["kode_gejala"]); $l++) { 
            $gejala = $check["kode_gejala"][$l];

            array_push($arr_gejala_uniq,$gejala);

          }

        }
      }

      if(!$found){
      $arr = array("kode_penyakit"=>$first["kode_penyakit"],"kode_gejala" => array($first["kode_gejala"]));
      array_push($new_data,$arr);
    }else{
      if($index >= 0){
        $new_data[$index]["kode_gejala"] = $arr_gejala_uniq;
      }
    }
    $arr_gejala_uniq = [];
    $index = -1;
    }
$result = [];
    for ($i=0; $i <count($new_data) ; $i++) { 
      $used = $new_data[$i];
      if(count($used["kode_gejala"]) > 1){
        $value = 0; 
        $countmb = 0;
          $countmd = 0;
        for ($j=0; $j <count($used["kode_gejala"]) ; $j++) { 
          $kode_gejala = $used["kode_gejala"][$j];
          $kode_penyakit = $used["kode_penyakit"];
          $found_detail = query("select * from basispengetahuan,penyakit where basispengetahuan.kode_penyakit = penyakit.kode_penyakit and basispengetahuan.kode_gejala ='".$kode_gejala."' and basispengetahuan.kode_penyakit = '".$kode_penyakit."'");
          $found_detail =$found_detail[0];
          $mb=(float) str_replace(',', '.', $found_detail["mb"]);
          $md=(float) str_replace(',', '.', $found_detail["md"]);
          if($j ==0 ){
            $countmb = 0+($mb*(1-0)); 
            $countmd = 0+($md*(1-0)); 
           
          }else{
            $countmb = $mb+($countmb*(1-$mb)); 
            $countmd = $md+($countmd*(1-$md)); 
          }
          
        }
        $value = $countmb - $countmd;
       
        array_push($result,array("kode_penyakit" => $kode_penyakit,"id_penyakit" => $found_detail["id_penyakit"],"nama_penyakit" => $found_detail["nama_penyakit"],"value" => $value));


      }else{
        $kode_gejala = $used["kode_gejala"][0];
        $kode_penyakit = $used["kode_penyakit"];
        $found_detail = query("select * from basispengetahuan,penyakit where basispengetahuan.kode_penyakit = penyakit.kode_penyakit and basispengetahuan.kode_gejala ='".$kode_gejala."' and basispengetahuan.kode_penyakit = '".$kode_penyakit."'");
        $found_detail =$found_detail[0];
        $mb=(float) str_replace(',', '.', $found_detail["mb"]);
        $md=(float) str_replace(',', '.', $found_detail["md"]);
        $value = $mb -  $md;
        array_push($result,array("kode_penyakit" => $kode_penyakit,"nama_penyakit" => $found_detail["nama_penyakit"],"id_penyakit" => $found_detail["id_penyakit"],"value" => $value));
      }

    }

    $sorted = usort($result, function ($item1, $item2) {
      return $item2['value'] <=> $item1['value'];
  });
    tambah_result_konsultasi($_SESSION["id_user"],$result[0]["id_penyakit"],(string)$result[0]["value"]*100);


    die();
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


             
                    <div class="panel panel-info">
                    </form>

                  </div>
                  <?php if($search){ ?>
                    <?php if(count($result) == 0){ ?>
                    <p class="text-center"> hasil diagnosis tidak di temukan</p>
                      <?php
                      }else{ ?>
                      <div class="row">
                      <p>Hasil Diagnosis :</p>
                      <!-- result -->
                      <table class="table table-bordered">
                                <tr class="text-center text-light" style="background-color:#2D6187;">
                                <th>Kode Penyakit</th>
                                <th>Nama penyakit</th>
                                <th>Presentase</th>
                                <th>Aksi</th>
                                </tr>

                                <?php $i = 1; ?>
                                <?php foreach($result as $row) : ?>
                                <tr class="text-center">
                                <td><?= $row["kode_penyakit"]; ?> </td>
                                <td><?= $row["nama_penyakit"];?> </td>
                                <td><?= $row["value"]*100; ?>% </td>
                                <td>
                                  <a href="detail_penyakit.php?kode_penyakit=<?= $row["kode_penyakit"];?>" >Detail penyakit <a style="margin-left:5px" class="mdi mdi-book-open-page-variant"></a></a>
                                </td>
                                </tr>
                                <?php endforeach; ?>
                            </table><br><br>
                            <!-- end result -->
                      </div>
                      <?php } ?>
   
                  <?php } ?>
                 
                </div>
              </div>

            </div>
            
          </div>
          <!-- content-wrapper ends -->

                   

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