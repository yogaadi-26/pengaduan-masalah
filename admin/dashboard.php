<?php

include 'koneksi.php';

// Hitung jumlah user
$sql    = "SELECT id_user FROM user WHERE level = 'user'";
$query  = mysqli_query($conn, $sql);
$user   = mysqli_num_rows($query);

// Hitung jumlah laporan
$sql2    = "SELECT id_laporan FROM laporan";
$query2  = mysqli_query($conn, $sql2);
$laporan = mysqli_num_rows($query2);

// Hitung jumlah laporan selesai
$sql3    = "SELECT id_laporan FROM laporan WHERE status = '3'";
$query3  = mysqli_query($conn, $sql3);
$selesai = mysqli_num_rows($query3);

// Hitung jumlah laporan diproses
$sql4   = "SELECT id_laporan FROM laporan WHERE status = '2'";
$query4 = mysqli_query($conn, $sql4);
$proses = mysqli_num_rows($query4);

// Hitung jumlah laporan yang masuk
$sql5   = "SELECT id_laporan FROM laporan WHERE status = '1'";
$query5 = mysqli_query($conn, $sql5);
$masuk = mysqli_num_rows($query5);

?>
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item">Dashboard</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Info boxes -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">User</span>
                    <a href="admin.php?page=user" class="info-box-number text-dark" >
                      <?= $user; ?>
                    </a>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-file"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Total Laporan</span>
                    <span class="info-box-number"> <?= $laporan; ?> </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <!-- fix for small devices only -->
              <div class="clearfix hidden-md-up"></div>

              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Selesai</span>
                    <a href="admin.php?page=selesai-lapor" class="info-box-number text-dark"> <?= $selesai; ?> </a>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-spinner"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Proses</span>
                    <a href="admin.php?page=proses-laporan" class="info-box-number text-dark"> <?= $proses; ?> </a>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h5 class="m-0">E-Dumas</h5>
                  </div>
                  <div class="card-body">
                    <h6 class="card-title">Selamat Datang Administrator !</h6>

                    <p class="card-text">Hallo <?= $_SESSION['nama']; ?>, Terdapat <?= $masuk; ?> laporan yang perlu ditanggapi </p>
                    <p class="text-muted">Klik tombol dibawah ini untuk memulai </p>
                    <a href="admin.php?page=laporan" class="btn btn-primary">Mulai</a>
                  </div>
                </div>
              </div>
             </div> 

           </div>
          </div>