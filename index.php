<?php

include ("koneksi.php");

session_start();

# Cek session sebelumnya
if (isset($_SESSION['email'])) {
	header("Location: admin.php");
   } 
 
 # Aksi Login Button
if (isset($_POST['login'])) {

# Ambil Value Form Login	
$email 		= mysqli_real_escape_string($conn, $_POST['email']);
$password 	= mysqli_real_escape_string($conn, $_POST['password']);
$password 	= md5($password);

# Query SELECT SQL
$user 	= "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
$sql 	= mysqli_query($conn, $user);
$data 	= mysqli_fetch_assoc($sql);


# Jika Validasi berhasil, Set SESSION, Alihkan ke Beranda
if (!empty($data)) {
	$_SESSION['id_user']= $data['id_user'];
	$_SESSION['email'] 	= $data['email'];
	$_SESSION['nama']	= $data['nama'];
	$_SESSION['level']  = $data['level'];
	header("Location: admin.php");
 }

else {
	echo "<script type='text/javascript'>
		 alert('Email atau Password Salah');
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
  <title>Log in | E-Dumas</title>
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
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#" class="font-weight-bold" style="letter-spacing: 2px;">E-Dumas</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Halaman Login</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" name="login" class="btn btn-primary btn-block" value="Login"> 
          </div>
          <!-- /.col -->
        </div>
      </form>

        <a href="register.php" class="text-center mt-3">Register Account</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>

</body>
</html>
