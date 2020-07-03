 <?php

include ("koneksi.php");

$id = $_SESSION['id_user'];

$sql     = "SELECT * FROM laporan WHERE id_user = '$id'";
$query   = mysqli_query($conn, $sql);

?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Status Laporan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Laporan</li>
              <li class="breadcrumb-item">Status</li>
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
          <div class="col-10">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laporan Anda</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Waktu Lapor</th>
                      <th>Subjek</th>
                      <th>Masalah</th>
                      <th>Status</th>
                      <th>More</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php while($laporan = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= date('d-m-Y H:i',$laporan['waktu_lapor']); ?></td>
                      <td><?= $laporan['subjek']; ?></td>
                      <td><?= $laporan['masalah']; ?></td>
                      <td><?php if ($laporan['status'] == '1') echo '<span class="badge badge-pill badge-secondary">Belum Ditanggapi</span>';
                                elseif ($laporan['status'] == '2') echo '<span class="badge badge-pill badge-primary">Diproses</span>';
                                else echo '<span class="badge badge-pill badge-success">Selesai</span>'; ?>
                      </td>
                      <td><a href="user.php?page=detail-laporan&id_laporan=<?= $laporan['id_laporan']; ?>"> Detail </a></td>
                    </tr>
                    <?php $i++;?>
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