<?php

session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: ../../login/login_admin.php");
    exit;
}

require '../koneksi.php';

$id = $_GET["id"];

if( hapus_penyakit($id) > 0 ) {
  echo "
      <script>
        alert('data berhasil dihapus!');
        document.location.href = 'dpenyakit.php';
      </script>  
    ";
} else {
  echo "
      <script>
        alert('data gagal dihapus!');
        document.location.href = 'dpenyakit.php';
      </script>  
    ";
}


?>