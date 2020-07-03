<?php

include 'koneksi.php';

if (!isset($_GET['id_laporan'])) {
	header("Location: admin.php");
}

$id 	 = $_GET['id_laporan'];

$sql 	 = "SELECT laporan.*, user.nama, user.email FROM laporan 
		    INNER JOIN user USING(id_user)
		    WHERE id_laporan = '$id'";
$query 	 =  mysqli_query($conn, $sql);
$laporan = 	mysqli_fetch_assoc($query);

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
          <li class="breadcrumb-item">Laporan</li>
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
                <h5 class="m-0">Detail</h5>
              </div>
              <div class="card-body">
                <form action="" method="post">
                	<p class="h5">Data Pelapor</p> <hr>
                	<div class="form-group row">
                	  <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                	  <div class="col-sm-10">
                	    <input type="text" readonly class="form-control-plaintext" id="Nama" value="<?= $laporan['nama']; ?>">
                	  </div>
                	</div>
                	<div class="form-group row">
                	  <label for="email" class="col-sm-2 col-form-label">Email</label>
                	  <div class="col-sm-10">
                	    <input type="text" readonly class="form-control-plaintext" id="email" value="<?= $laporan['email']; ?>">
                	  </div>
                	</div>
                	<p class="h5">Detail Laporan</p> <hr>
                	<div class="form-group row">
                	  <label for="subjek" class="col-sm-2 col-form-label">Subjek</label>
                	  <div class="col-sm-10">
                	    <input type="text" readonly class="form-control-plaintext" id="subjek" value="<?= $laporan['subjek']; ?>">
                	  </div>
                	</div>
                	<div class="form-group row">
                	  <label for="masalah" class="col-sm-2 col-form-label">Masalah</label>
                	  <div class="col-sm-10">
                	    <input type="text" readonly class="form-control-plaintext" id="masalah" value="<?= $laporan['masalah']; ?>">
                	  </div>
                	</div>
                	<div class="form-group row">
                	  <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                	  <div class="col-sm-10">
                	    <input type="text" readonly class="form-control-plaintext" id="lokasi" value="<?= $laporan['lokasi']; ?>">
                	  </div>
                	</div>
                	<div class="form-group row">
                	  <label for="subjek" class="col-sm-2 col-form-label">Detail</label>
                	  <div class="col-sm-10">
                	  	<textarea class="form-control-plaintext" readonly> <?= $laporan['detail']; ?> </textarea>
                	  </div>
                	</div>
                	<div class="form-group row">
                	  <label for="subjek" class="col-sm-2 col-form-label">Dokumentasi</label>
                	  <div class="col-sm-10">
                	  	<!-- Trigger the Modal -->
						<img id="myImg" src="img/upload/<?= $laporan['gambar']; ?>" class="img-thumbnail" style="height: 100px;" >

						<!-- The Modal -->
						<div id="myModal" class="modal">

						  <!-- The Close Button -->
						  <span class="close">&times;</span>

						  <!-- Modal Content (The Image) -->
						  <img class="modal-content" id="img01">
	                	  </div>
	                	</div>
	                </div>
	                <div class="form-group row">
	                  <label for="subjek" class="col-sm-2 col-form-label">Status</label>
	                  <div class="col-sm-10 pt-2">
	                  	<?php if ($laporan['status'] == '1') echo '<span class="badge badge-pill badge-secondary">Belum Ditanggapi</span>';
                        elseif ($laporan['status'] == '2') echo '<span class="badge badge-pill badge-primary">Diproses</span>';
                        else echo '<span class="badge badge-pill badge-success">Selesai</span>'; ?>
	                  </div>
	                </div>
					</form>
               </div>
            </div>

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content --> 	

