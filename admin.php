<?php

session_start();

include 'koneksi.php';
# Memastikan user sudah login terlebih dahulu
if (!isset($_SESSION['email'])) {
	header("Location: index.php");
}

	# Validasi Multiuser login
	if ($_SESSION['level'] == "admin") {
		# Tetap berada di halaman admin.php
	}
	
	# Level selain admin, alihkan ke halaman user
	else {
		header("Location: user.php");
	}
$id   = $_SESSION['id_user'];

# query SQL SELECT dari Database
$sql    = "SELECT * FROM user WHERE id_user = '$id'";
$query  = mysqli_query($conn, $sql);
$profil = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin | E-Dumas</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <link rel="stylesheet" href="css/image.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
     <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    	<li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-th-large"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">Settings</span>
          <div class="dropdown-divider"></div>
          <a href="admin.php?page=profile&id_user=<?= $_SESSION['id_user']; ?>" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item">
            <i class="fas fa-power-off mr-2"></i> Logout
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>	
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">E - Dumas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/profile/<?= $profil['profil']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $profil['nama']; ?></a>
        </div>
      </div>
        <div class="text-muted text-center">Role : <?= ucfirst($profil['level']); ?></div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="admin.php?page=dashboard" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
           <li class="nav-item">
              <a href="admin.php?page=user" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Users</p>
              </a>
            </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin.php?page=laporan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin.php?page=proses-lapor" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin.php?page=selesai-lapor" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Selesai</p>
                </a>
              </li>
          </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="position: relative;">
    <?php include 'admin/config.php'; ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- Modal -->
<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Default Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" id="idmenu">
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="assets/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
<script src="js/navigation.js"></script>
<script src="js/image.js"></script>

<script>
  $(document).ready(function(){
    $(document).on('click','#menu',function(){
      var id = $(this).data("id");
      $('#idmenu').text(id);
     }); 
  });
</script>

</body>
</html>