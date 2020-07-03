<?php

include ("koneksi.php");

$sql    = "SELECT * FROM user WHERE level = 'user'";
$query  = mysqli_query($conn, $sql);

?>    
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Users</li>
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
                <h3 class="card-title">Manajemen User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Level</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php while($user = mysqli_fetch_assoc($query)): ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $user['nama']; ?></td>
                      <td><?= $user['email']; ?> </td>
                      <td><?= ucfirst($user['level']); ?></td>
                      <td><a href="admin.php?page=delete&id_user=<?= $user['id_user']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ini?');"> <i class="fas fa-trash"></i> Hapus</a></td>
                    </tr>
                    <?php $i++; ?>
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