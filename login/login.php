<?php
session_start();
require 'config.php';

//cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id=$_COOKIE['id'];
    $key=$_COOKIE['key'];
    //ambil username berdasarkan id
    $result=mysqli_query($conn, "SELECT username FROM user WHERE id=$id");
    $row=mysqli_fetch_assoc($result);
    //cek cookie dan username
    if ( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }
}

//cek apakah tombol submit telah ditekan atau belum
if(isset($_POST["login"])) {
    $username=$_POST["username"];
	$password=$_POST["password"];
    //cek username di dalam db yg sama dengan username input login
	$result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
	
	if ($result) {
		if (mysqli_num_rows($result)>0) {
			$_SESSION['username']=$username;
		}
	}

    //cek username
    if(mysqli_num_rows($result) === 1) {
        //cek password
        $row=mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        $_SESSION["id_user"] = $row["id_user"];
        if(password_verify($password, $row["password"]) ) {
			if ($row['role'] == "Admin") {
                echo "<script> document.location.href='../page/admin/index_admin.php'</script>";
                } else if ($row['role'] == "Dokter") {
                echo "<script> document.location.href='../page/dokter/index_dokter.php'</script>";
                } else if ($row['role'] == "Pasien") {
                echo "<script> document.location.href='../page/pasien/index_pasien.php'</script>";
                }
			//set session
			
            $_SESSION["login"]=true;
            $_SESSION["id_user"] = $row["id_user"];
            //cek remember me
            if( isset($_POST['remember'])) {
                //buat cookie
                setcookie('id', $row['id'], time()+60);
                setcookie('key', hash('sha256', $row['username']), time()+60);
            }

            exit;
        }
    }
    $error=true;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="../assets/img/login.png" alt="sing up image"></figure>
                        <a href="registrasi.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log In</h2>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Masukkan Username" autocomplete="off" required/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Masukkan Password" autocomplete="off" required/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember" id="remember" class="agree-term" />
                                <label for="remember" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="login" class="form-submit" value="Log In"/>
                            </div>
                            <br>
                            <?php if(isset($error) ) : ?>
								<p style="color: red; font-style: italic">Username / password salah</p>
							<?php endif; ?>
                        </form>
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