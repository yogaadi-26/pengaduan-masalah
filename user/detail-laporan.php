<?php
include ("koneksi.php");

if (!isset($_GET['id_laporan'])) {
  header("Location: user.php");
}

# Ambil id user dari URL
$id   = $_GET['id_laporan'];

# query SQL SELECT dari Database
$sql     = "SELECT * FROM laporan WHERE id_laporan = '$id'";
$query   = mysqli_query($conn, $sql);
$laporan = mysqli_fetch_assoc($query);

  # Jika data id_user tidak ditemukan 
  if (mysqli_num_rows($query) < 1) {
    echo "<script type='text/javascript'>
        alert('Maaf. Data tidak ditemukan');
        window.location='user.php';
        </script>";
  } 

?>   

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detail</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Status Laporan</li>
              <li class="breadcrumb-item">Detail</li>
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
          <div class="col-lg-10">
            
          <!-- /.col-md-6 -->
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Detail Laporan Anda</h5>
              </div>
              <div class="card-body">
                <form action="" method="post">
                  <input type="hidden" name="id" value="<?= $laporan['id_laporan']; ?>">
                  <div class="form-group row">
                    <label for="subjek" class="col-sm-2 col-form-label">Subjek</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="subjek" value="<?= $laporan['subjek']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="subjek" class="col-sm-2 col-form-label">Masalah</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="subjek" value="<?= $laporan['masalah']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="subjek" class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="subjek" value="<?= $laporan['lokasi']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="subjek" class="col-sm-2 col-form-label">Detail</label>
                    <div class="col-sm-10">
                      <textarea readonly class="form-control-plaintext" id="subjek"> <?= $laporan['detail']; ?> </textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10 pt-2">
                      <?php if ($laporan['status'] == '1') echo '<span class="badge badge-pill badge-secondary">Belum Ditanggapi</span>';
                                elseif ($laporan['status'] == '2') echo '<span class="badge badge-pill badge-primary">Diproses</span>';
                                else echo '<span class="badge badge-pill badge-success">Selesai</span>'; ?>
                    </div>
                  </div>
                  <?php if($laporan['status'] == '2') 
                  echo '<div> <input type="submit" name="submit" class="btn btn-success" value="Masalah Telah Diselesaikan">  </div>'; 
                  ?>
                </form>
                  <?php if ($laporan['status'] == '3') 
                  echo '<div> <button type="button" class="btn btn-success disabled"><i class="fas fa-check pr-2"> </i> Masalah Selesai</button> </div>';
                  ?>
              </div>
            </div>

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

<?php

if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    $sql2    = "UPDATE laporan SET status = '3' WHERE id_laporan = '$id'";
    $query2  = mysqli_query($conn, $sql2);

    if ($query2) {
    echo "<script type='text/javascript'>
       alert('Berhasil menyimpan perubahan');
       window.location='user.php';
       </script>";
    }
  }
?>