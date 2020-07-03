<?php

include ("koneksi.php");

# Aksi Register Button 
if (isset($_POST['register'])) {
	
	# Ambil Value Form, Non XSS-Script dan Enkripsi Password
	$nama 		= htmlspecialchars($_POST['nama']);
	$email 		= htmlspecialchars($_POST['email']);
	$pass 		= htmlspecialchars(md5($_POST['password']));
	$pass2 		= htmlspecialchars(md5($_POST ['password2']));

	# Validasi Konfirmasi Password
	if ($pass != $pass2) {
		echo "<script type='text/javascript'>
			 alert('Konfirmasi password salah');
			 window.location='register.php';
			 </script>";
		return false;	   
	}

	# Validasi Email
	$check 			= "SELECT * FROM user WHERE email = '$email' ";
	$check_email 	= mysqli_num_rows(mysqli_query($conn, $check));

	# Return False, Jika email yang digunakan telah terdaftar
	if ($check_email > 0) {
		echo "<script type='text/javascript'>
			 alert('Maaf. Email sudah digunakan, harap menggunakan email yang lain');
			 window.location='register.php';
			 </script>";
		return false;	
	}

# Insert Data User ke Database		
$sql	= "INSERT INTO user (nama, email, password, profil, level)
		   VALUES ('$nama', '$email', '$pass', 'user.png', 'user')";
$query 	=  mysqli_query($conn, $sql);
	
	# Query berhasil, Tampilkan pesan berhasil
	if ($query) {
		echo "<script type='text/javascript'>
			 alert('Register Berhasil');
			 window.location='index.php';
			 </script>";
		}	
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registration | E-Dumas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#" class="font-weight-bold" style="letter-spacing: 2px;">E-Dumas</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Halaman Register</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="nama" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" name="password2" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8 pt-2">
          <a href="login.php" class="text-center">Sudah Punya Akun ?  </a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" name="register" class="btn btn-primary btn-block" value="Register">
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="assets/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
</body>
</html>