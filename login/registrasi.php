<?php
require 'config.php';

if(isset($_POST["register"])) {
    if(registrasi($_POST)>0) {
        echo "<script>
                alert('Selamat, Anda Berhasil Mendaftar');
                document.location.href='login.php'
              </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Registrasi</h2>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nama"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Lengkap" autocomplete="off" required/>
                            </div>
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Masukkan username" autocomplete="off" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Masukkan Email" autocomplete="off" required/>
                            </div>
                            <div class="form-group">
                                <label for="jk"><i class="zmdi zmdi-accounts-list-alt"></i></label>
                                <input type="jk" name="jk" id="jk" placeholder="Masukkan Jenis Kelamin" autocomplete="off" required/>
                            </div>
                            <div class="form-group">
                                <label for="usia"><i class="zmdi zmdi-calendar-alt"></i></label>
                                <input type="date" name="usia" id="usia" placeholder="Masukkan Tanggal lahir" autocomplete="off" required/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Masukkan Password" autocomplete="off" required/>
                            </div>
                            <div class="form-group">
                                <label for="password2"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password2" id="password2" placeholder="Masukan kembali password" autocomplete="off" required/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="role" id="role" value="Pasien" readonly/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="register" id="register" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image"><br><br><br><br>
                        <figure><img src="../assets/img/regis.png" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>