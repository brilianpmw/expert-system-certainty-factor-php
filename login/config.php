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


//registrasi
function registrasi($data) {
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
    mysqli_query($conn, "INSERT INTO user  VALUES (null, '$nama', '$username', '$email', '$jk', '$password', '$role','$usia')");

    return mysqli_affected_rows($conn);

}

//tambah pesan
function tambah_pesan($data) {
  global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $subjek = htmlspecialchars($data["subjek"]);
    $pesan = htmlspecialchars($data["pesan"]);
  $query = "INSERT INTO pesan
              VALUES
              ('','$nama', '$email', '$subjek', '$pesan' )
            ";
  mysqli_query($conn, $query);
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

?>