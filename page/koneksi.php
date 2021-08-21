<?php

//koneksi ke db
$conn = mysqli_connect("localhost", "root", "", "metabolik");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

//-----------------USER----------------------//
//registrasi
function tambah_user($data) {
  global $conn;
  $nama = $data["nama"];
  $username = strtolower(stripslashes($data["username"]));
  $email = $data["email"];
  $jk = $data["jk"];
  $usia = $data["usia"];
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);
  $role = $data["role"];
  //cek username sudah ada atau belum
  $result=mysqli_query($conn, "SELECT username FROM user WHERE 
          username='$username'");
  if(mysqli_fetch_assoc($result))  {
    echo "<script>
            alert('username sudah terdaftar!');
          </script>";
    return false;
  }
  //cek konfirmasi password
  if($password !== $password2) {
    echo "<script>
            alert('konfirmasi password tidak sesuai!');
          </script>";
    return false;
  }
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    //tambahkan username ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$nama', '$username', '$email', '$jk', '$password', '$role', '$usia')");
    return mysqli_affected_rows($conn);
}


function ubah_user($data) {
  global $conn;
      $id_user = htmlspecialchars($data["id_user"]);
      $nama = htmlspecialchars($data["nama"]);
      $username = htmlspecialchars($data["username"]);
      $email = htmlspecialchars($data["email"]);
      $jk = htmlspecialchars($data["jk"]);
      $password = mysqli_real_escape_string($conn, $data["password"]);
      $password2 = mysqli_real_escape_string($conn, $data["password2"]);
      //cek username sudah ada atau belum
    $result=mysqli_query($conn, "SELECT username FROM user WHERE 
    username='$username'");
  if(mysqli_fetch_assoc($result))  {
  echo "<script>
      alert('username sudah terdaftar!');
    </script>";
  return false;
  }
      //konfirmasi password
      if($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
              </script>";
        return false;
      }
        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
      $role = htmlspecialchars($data["role"]);
      $usia = $data["usia"];
    $query = "UPDATE user SET
                nama = '$nama',
                username = '$username',
                email = '$email', 
                jk = '$jk', 
                password = '$password', 
                role = '$role',
                tgl_lahir = '$usia'
                WHERE id_user = '$id_user'
              ";
    mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

//-----------------PENYAKIT----------------------//
//ubah penyakit
function ubah_penyakit($data) {
  global $conn;
      $id_penyakit = $data["id_penyakit"];
      $kode_penyakit = htmlspecialchars($data["kode_penyakit"]);
      $nama_penyakit = htmlspecialchars($data["nama_penyakit"]);
      $gambarLama=htmlspecialchars($data['gambarLama']);
        if($_FILES['gambar']['error'] === 4 ) {
          $gambar=$gambarLama;
        } else {
          $gambar=upload_resep();
        }
      $keterangan = htmlspecialchars($data["keterangan"]);
      $solusi = htmlspecialchars($data["solusi"]);
      $penyebab = htmlspecialchars($data["penyebab"]);
    $query = "UPDATE penyakit SET 
                kode_penyakit = '$kode_penyakit',
                nama_penyakit = '$nama_penyakit',
                gambar = '$gambar',
                keterangan = '$keterangan',
                solusi = '$solusi',
                penyebab = '$penyebab'
              WHERE id_penyakit=$id_penyakit
              ";
    mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

//tambah penyakit
function tambah_penyakit($data) {
  global $conn;
  //ambil data dari tiap elemen dalam form
  $kode_penyakit = htmlspecialchars($data["kode_penyakit"]);
  $nama_penyakit = htmlspecialchars($data["nama_penyakit"]);
  $gambar=upload_resep();
      if( !$gambar) {
        return false;
      }
  $keterangan = htmlspecialchars($data["keterangan"]);
  $solusi = htmlspecialchars($data["solusi"]);
  $penyebab = htmlspecialchars($data["penyebab"]);
  //cek kode peyakit sudah ada atau belum
    $result=mysqli_query($conn, "SELECT kode_penyakit FROM penyakit WHERE 
    kode_penyakit='$kode_penyakit'");
    if(mysqli_fetch_assoc($result))  {
    echo "<script>
      alert('Kode Penyakit sudah Terdaftar :) ');
    </script>";
    return false;
    }
  $query = "INSERT INTO penyakit
              VALUES
              ('', '$kode_penyakit', '$nama_penyakit', '$gambar', '$keterangan', '$solusi', '$penyebab')
            ";
  mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}


function upload_resep() {
  $namaFile=$_FILES['gambar']['name'];
  $ukuranFile=$_FILES['gambar']['size'];
  $error=$_FILES['gambar']['error'];
  $tmpName=$_FILES['gambar']['tmp_name'];
  if( $error === 4) {
    echo "<script>
            alert('Pilih gambar terlebih dahulu!');
          </script>";
    return false;
  }
  $ekstensiGambarValid=['jpg','jpeg','png'];
  $ekstensiGambar=explode('.',$namaFile);
  $ekstensiGambar=strtolower(end($ekstensiGambar));
  if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
    echo "<script>
            alert('Yang anda upload bukan gambar!');
          </script>";
    return false;
  } 
  if($ukuranFile > 1000000) {
    echo "<script>
            alert('Ukuran gambar terlalu besar!');
          </script>";
    return false;
  }
  $namaFileBaru= uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;
  if(move_uploaded_file($tmpName,'../../img/'.$namaFileBaru)){

  return $namaFileBaru;
  }else { 
       echo "<script>
            alert('gambar gagal di upload');
          </script>";
    return false;
  }
}

//cari
function cari_penyakit($keyword) {
  $query="SELECT * FROM penyakit 
          WHERE
          nama_penyakit LIKE '%$keyword%'
        ";
  return query($query);
}


//hapus penyakit
function hapus_penyakit($id_penyakit) {
  global $conn;
  mysqli_query($conn, "DELETE FROM penyakit WHERE id_penyakit=$id_penyakit");
  return mysqli_affected_rows($conn);
}

//------------------GEJALA----------------//
//tambah penyakit
function tambah_gejala($data) {
  global $conn;
  //ambil data dari tiap elemen dalam form
  $kode_gejala = htmlspecialchars($data["kode_gejala"]);
  $nama_gejala = htmlspecialchars($data["nama_gejala"]);
  //cek kode peyakit sudah ada atau belum
    $result=mysqli_query($conn, "SELECT kode_gejala FROM gejala WHERE 
    kode_gejala='$kode_gejala'");
    if(mysqli_fetch_assoc($result))  {
    echo "<script>
      alert('Kode gejala sudah Terdaftar :) ');
    </script>";
    return false;
    }
  $query = "INSERT INTO gejala
              VALUES
              ('', '$kode_gejala', '$nama_gejala')
            ";
  mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

//ubah gejala
function ubah_gejala($data) {
  global $conn;
      $id_gejala = $data["id_gejala"];
      $kode_gejala = htmlspecialchars($data["kode_gejala"]);
      $nama_gejala = htmlspecialchars($data["nama_gejala"]);
    $query = "UPDATE gejala SET 
                kode_gejala = '$kode_gejala',
                nama_gejala = '$nama_gejala'
              WHERE id_gejala=$id_gejala
              ";
    mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

//cari
function cari_gejala($keyword) {
  $query="SELECT * FROM gejala 
          WHERE
          nama_gejala LIKE '%$keyword%'
        ";
  return query($query);
}

//hapus penyakit
function hapus_gejala($id_gejala) {
  global $conn;
  mysqli_query($conn, "DELETE FROM gejala WHERE id_gejala=$id_gejala");
  return mysqli_affected_rows($conn);
}

//cari
function cari_riwayat($keyword) {
  $query="SELECT  user.nama, penyakit.nama_penyakit,hasilkonsultasi.tanggal,hasilkonsultasi.id_konsultasi
  FROM user, penyakit, hasilkonsultasi
    WHERE penyakit.id_penyakit=hasilkonsultasi.id_penyakit
      AND user.id_user=hasilkonsultasi.id_user 
       AND nama LIKE '%$keyword%'
        ";
  return query($query);
}

//cari
function cari_rule($keyword) {
  $query="SELECT penyakit.nama_penyakit,gejala.nama_gejala, basispengetahuan.mb, basispengetahuan.md, basispengetahuan.id_rule, basispengetahuan.kode_rule, basispengetahuan.kode_penyakit, basispengetahuan.kode_gejala
  FROM penyakit, gejala, basispengetahuan
    WHERE penyakit.kode_penyakit=basispengetahuan.kode_penyakit
      AND gejala.kode_gejala=basispengetahuan.kode_gejala
          AND nama_penyakit LIKE '%$keyword%'
        ";
  return query($query);
}

function tambah_result_konsultasi($id_user,$id_penyakit,$presentasi) {
  global $conn;
 $curr_date = date("Y-m-d");
  $query = "INSERT INTO hasilkonsultasi
              VALUES
              (null, $id_user, $id_penyakit, '$curr_date','$presentasi')
            ";
   mysqli_query($conn, $query);
  
return mysqli_affected_rows($conn);
}

//tambah resep
function tambah_rule($data) {
  global $conn;
  //ambil data dari tiap elemen dalam form
    $kode_rule = htmlspecialchars($data["kode_rule"]);
    $kode_penyakit = $data["penyakit"];
    $kode_gejala = $data["gejala"];
    $mb=$data["mb"];
    $md=$data["md"];
    //cek kode rule sudah ada atau belum
    $result=mysqli_query($conn, "SELECT kode_rule FROM basispengetahuan WHERE 
    kode_rule='$kode_rule'");
    if(mysqli_fetch_assoc($result))  {
    echo "<script>
      alert('Kode bahan sudah Terdaftar :) ');
    </script>";
    return false;
    }
    $query = "INSERT INTO basispengetahuan
              VALUES
              ('', '$kode_rule', '$kode_penyakit', '$kode_gejala', '$mb', '$md')
            ";
  mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
    }

//ubah gejala
function ubah_rule($data) {
  global $conn;
      $id_rule = $data["id_rule"];
      $kode_rule = htmlspecialchars($data["kode_rule"]);
      $kode_penyakit = htmlspecialchars($data["penyakit"]);
      $kode_gejala = htmlspecialchars($data["gejala"]);
      $mb = htmlspecialchars($data["mb"]);
      $md = htmlspecialchars($data["md"]);
    $query = "UPDATE basispengetahuan SET 
                kode_rule = '$kode_rule',
                kode_penyakit = '$kode_penyakit',
                kode_gejala = '$kode_gejala',
                mb = '$mb',
                md = '$md'
              WHERE id_rule=$id_rule
              ";
    mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

//hapus rule
function hapus_aturan($id_rule) {
  global $conn;
  mysqli_query($conn, "DELETE FROM basispengetahuan WHERE id_rule=$id_rule");
  return mysqli_affected_rows($conn);
}

//cari
function cari_userd($keyword) {
  $query="SELECT * FROM user 
          WHERE role='Dokter' AND 
          nama LIKE '%$keyword%'
        ";
  return query($query);
}

function cari_userp($keyword) {
  $query="SELECT * FROM user 
          WHERE role='Pasien' AND
          nama LIKE '%$keyword%'
        ";
  return query($query);
}

function hapus_user($id_user) {
  global $conn;
  mysqli_query($conn, "DELETE FROM user WHERE id_user=$id_user");
  return mysqli_affected_rows($conn);
}

//tambah penyakit
function tambah_bahan($data) {
  global $conn;
  //ambil data dari tiap elemen dalam form
  $kode_bahan = htmlspecialchars($data["kode_bahan"]);
  $nama_bahan = htmlspecialchars($data["nama_bahan"]);
  $kalori = htmlspecialchars($data["kalori"]);
  $lemak = htmlspecialchars($data["lemak"]);
  $karbohidrat = htmlspecialchars($data["karbohidrat"]);
  $protein = htmlspecialchars($data["protein"]);
  $ket = htmlspecialchars($data["ket"]);
  //cek kode peyakit sudah ada atau belum
    $result=mysqli_query($conn, "SELECT kode_bahan FROM bpangan WHERE 
    kode_bahan='$kode_bahan'");
    if(mysqli_fetch_assoc($result))  {
    echo "<script>
      alert('Kode bahan sudah Terdaftar :) ');
    </script>";
    return false;
    }
  $query = "INSERT INTO bpangan
              VALUES
              ('', '$kode_bahan', '$nama_bahan', '$kalori', '$lemak', '$karbohidrat', '$protein', '$ket')
            ";
  mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

//ubah bahan
function ubah_bahan($data) {
  global $conn;
      $id_bahan = $data["id_bahan"];
      $kode_bahan = htmlspecialchars($data["kode_bahan"]);
      $nama_bahan = htmlspecialchars($data["nama_bahan"]);
      $kalori = htmlspecialchars($data["kalori"]);
      $lemak = htmlspecialchars($data["lemak"]);
      $karbohidrat = htmlspecialchars($data["karbohidrat"]);
      $protein = htmlspecialchars($data["protein"]);
      $ket = htmlspecialchars($data["ket"]);
    $query = "UPDATE bpangan SET 
                kode_bahan = '$kode_bahan',
                nama_bahan = '$nama_bahan',
                kalori = '$kalori',
                lemak = '$lemak',
                karbohidrat = '$karbohidrat',
                protein = '$protein',
                ket = '$ket'
              WHERE id_bahan=$id_bahan
              ";
    mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

//hapus bahan makanan
function hapus_bahan($id_bahan) {
  global $conn;
  mysqli_query($conn, "DELETE FROM bpangan WHERE id_bahan=$id_bahan");
  return mysqli_affected_rows($conn);
}

//cari
function cari_bahan($keyword) {
  $query="SELECT * FROM bpangan 
          WHERE
          nama_bahan LIKE '%$keyword%'
        ";
  return query($query);
}

function hapus_riwayat($id_konsultasi) {
  global $conn;
  mysqli_query($conn, "DELETE FROM hasilkonsultasi WHERE id_konsultasi=$id_konsultasi");
  return mysqli_affected_rows($conn);
}
?>