<?php

include 'koneksi.php';

$sql = "SELECT laporan.*, user.nama, user.email FROM laporan 
        INNER JOIN user USING(id_user) 
        WHERE laporan.status = '2' ";
$query = mysqli_query($conn, $sql);
 
?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Laporan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Laporan</li>
              <li class="breadcrumb-item">Proses</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-10">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laporan Diproses</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Waktu Lapor</th>
                      <th>Pelapor</th>
                      <th>Masalah</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <?php $i = 1; ?>
                    <?php while($laporan = mysqli_fetch_assoc($query)) : ?>
                      <td><?= $i; ?></td>
                      <td><?= date('d-m-Y H:i',$laporan['waktu_lapor']); ?></td>
                      <td><?= $laporan['nama']; ?></td>
                      <td><?= $laporan['masalah'] ?></td>
                      <td><a href="admin.php?page=detail-laporan&id_laporan=<?= $laporan['id_laporan'] ?>" class="btn btn-info btn-sm mr-2"><i class="fas fa-info"></i> Detail </a></td>
                    </tr>
                    <?php $i++ ?>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->