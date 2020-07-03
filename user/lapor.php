<?php

include ("koneksi.php");
	
if (isset($_POST['submit'])) {
	$id_user	= htmlspecialchars($_POST['id_user']);
	$subjek 	= htmlspecialchars($_POST['subjek']);
	$masalah 	= htmlspecialchars($_POST['masalah']);
	$lokasi 	= htmlspecialchars($_POST['lokasi']);
	$detail 	= htmlspecialchars($_POST['detail']);
	$gambar 	= upload();
	$status		= 1;
	$waktu		= time() + (5*60*60) ;

	if (!$gambar) {
		return false;
	}

	if ($masalah == "other") {
		 	$masalah = htmlspecialchars($_POST['masalahlain']);
		 }

	// Insert Laporan ke database
	$sql = "INSERT INTO laporan (id_user, subjek, masalah, lokasi, detail, gambar, status, waktu_lapor)  
			VALUES ('$id_user', '$subjek', '$masalah', '$lokasi', '$detail', '$gambar', '$status', '$waktu')";
	$query = mysqli_query($conn, $sql);

	// Query berhasil, arahkan ke beranda
	if ($query) {
		echo "<script>
				alert('Pengaduan laporan berhasil ditambahkan');
				window.location='user.php';
			  </script>";
	}

}

function upload() {

	$namaFile 	= $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error 		= $_FILES['gambar']['error'];
	$tmpName 	= $_FILES['gambar']['tmp_name'];

	// Validasi cek adakah gambar yang diupload
	if ($error === 4) {
		echo "<script>
				alert('Sertakan dokumentasi foto');
				window.location='user.php';
			  </script>";
		return false;	  
	}

	// Validasi apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('Upload foto yang valid');
				window.location='user.php'
			  </script>";
		return false;	
	}

	// Validasi ukuran file
	if ($ukuranFile > 5000000) {
		echo "<script>
				alert('Ukuran foto terlalu besar');
				window.location='user.php';
			  </script>";
		return false;	
	}

	// Upload foto
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/upload/'. $namaFileBaru);
	return $namaFileBaru; 
}

?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Lapor Masalah</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Lapor Masalah</li>
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
            <h5 class="m-0">Lapor Masalah</h5>
          </div>
          <div class="card-body">
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">
				<div class="form-group row">
			     <label for="subjek" class="col-sm-2 col-form-label">Subjek</label>
			     <div class="col-sm-8">
			       <select class="custom-select" name="masalah" id="subjek" required>
					<option value="Pengaduan">Pengaduan</option>
			       </select>	
			     </div>
			   </div>
			   <div class="form-group row">
			     <label for="response" class="col-sm-2 col-form-label">Jenis Masalah</label>
			     <div class="col-sm-8">
				   <select class="custom-select" name="masalah" id="response" required>
				    <option value="Kerusakan Listrik">Listrik tidak menyala atau kerusakan kelistrikan (Stop Kontak, dsb) </option>
					<option value="Kerusakan Sarana">Kerusakan sarana & prasarana kelas : Proyektor, AC, Meja, Kursi, dsb </option>
					<option value="Alat Kebersihan">Kehilangan & kekurangan peralatan kebersihan</option>
					<option value="other"> Lainnya </option>
				   </select>
				 </div>
				</div> 
				 <input type="hidden" id="real_response">
				<div class="form-group row">
			     <div class="col-sm-2"></div>
			     <div class="col-sm-8">
			     	<div id="hiddendiv" style="display: none;"> 
						<input type="text" id="text_response" name="masalahlain" class="form-control"> 
					</div>
				 </div>
				</div>
				 
			   	<div class="form-group row">
			     <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
			     <div class="col-sm-8">
			       <input type="text" class="form-control" id="lokasi" name="lokasi" required>
			     </div>
			   	</div>

			   	<div class="form-group row">
			     <label for="detail" class="col-sm-2 col-form-label">Detail</label>
			     <div class="col-sm-8">
			       <textarea class="form-control" id="detail" name="detail" required> </textarea>
			     </div>
			   	</div>

				<div class="form-group row">
			     <label for="detail" class="col-sm-2 col-form-label">Dokumentasi</label>
			     <div class="col-sm-8">
			     	<div class="custom-file">
			     	  <input type="file" class="custom-file-input" id="customFile" name="gambar">
			     	  <label class="custom-file-label" for="customFile">Choose file</label>
			     	</div>
			     	<small id="emailHelp" class="form-text text-muted">*Sertakan sebuah foto dengan format (JPG, JPEG, PNG)</small>
			     </div>	
			    </div>
		    	<div class="col-sm-2"></div>
		    	<div class="col-sm-8 pt-1">
		    	 	<input type="submit" class="btn btn-primary" name="submit" style="margin-left: 140px;">
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