  <?php

 include ("koneksi.php");

 $id = $_SESSION['id_user'];

 $sql     = "SELECT * FROM laporan WHERE id_user = '$id' AND status = '2'";
 $query   = mysqli_query($conn, $sql);
 $total   = mysqli_num_rows($query);

 ?> 

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Beranda</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Beranda</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            
          <!-- /.col-md-6 -->
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">E-Dumas</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Selamat Datang User!</h6>

                <p class="card-text">Hallo <?= $_SESSION['nama']; ?>, <br> E-Dumas adalah aplikasi berbasis web yang memungkinkan user untuk mengadukan sejumlah permasalahan yang terjadi di sekolah agar dapat ditanggapi permasalahannya secara cepat dan mudah.</p>
                <a href="user.php?page=lapor" class="btn btn-primary">Mulai</a>
              </div>
            </div>

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Konfirmasikan Laporan Anda</h5>

                <p class="card-text">
                  Anda memiliki <?= $total ?> laporan untuk dikonfirmasi. Klik link dibawah untuk mengonfirmasi
                </p>
                <a href="user.php?page=status-laporan" class="card-link">Status Laporan</a>
              </div>
            </div><!-- /.card -->
          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->