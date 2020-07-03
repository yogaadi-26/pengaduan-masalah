<?php

include ("koneksi.php");

if (!isset($_GET['id_user'])) {
	header("Location: user.php");
}

# Ambil id_user dari URL
$id 	= $_GET['id_user'];

# Query SQL SELECT dari database
$sql 		= "SELECT * FROM user WHERE id_user = '$id'";
$query 		= mysqli_query($conn, $sql);
$profil 	= mysqli_fetch_assoc($query);
$old_email 	= $profil['email'];

	# Jika data id_user tidak ditemukan 
	if (mysqli_num_rows($query) < 1) {
		echo "<script type='text/javascript'>
			  alert('Maaf. Data tidak ditemukan');
			  window.location='user.php';
			  </script>";
	}

	# Validasi profile berdasarkan id user
	if ($id != $_SESSION['id_user']) {
		echo "<script type='text/javascript'>
		      alert('Akses Dilarang');
		      window.location='user.php';
		      </script>";
	}
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Profile</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Profile</li>
          <li class="breadcrumb-item">Edit Profile</li>
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
            <h5 class="m-0">Edit Profile</h5>
          </div>
          <div class="card-body">
			<form action="" method="post">
			  <input type="hidden" name="id" value="<?= $profil['id_user']; ?>">
			  <div class="form-group row">
			    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
			    <div class="col-sm-8">
			      <input type="email" name="email" class="form-control" id="inputEmail3" value="<?= $profil['email']; ?>" required>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
			    <div class="col-sm-8">
			      <input type="text" name="nama" class="form-control" id="nama" value="<?= $profil['nama']; ?>" required>
			    </div>
			  </div>
			  <div class="form-group row">
				  <div class="col-sm-2">
				  </div>
				  <div class="col-sm-8 mt-2 pb-3">	
				  	<input type="submit" name="submit" class="btn btn-primary">
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

<?php
# Aksi Submit Button 
if (isset($_POST['submit'])) {
	
	# Ambil Value Form, Non XSS-Script dan Enkripsi Password
	$id 	= $_POST['id'];
	$nama 	= htmlspecialchars($_POST['nama']);
	$email 	= htmlspecialchars($_POST['email']);

	# Validasi email
	$check 			= "SELECT * FROM user WHERE email = '$email' ";
	$check_email 	= mysqli_num_rows(mysqli_query($conn, $check));

	# Return False, jika email yang digunakan sudah terdaftar
	if ($email != $old_email) {
		if ($check_email > 0)  {
			echo "<script type='text/javascript'>
			 alert('Maaf. Email sudah digunakan, harap menggunakan email yang lain');
			 window.location='user.php';
			 </script>";
		return false;
		}
	}

# Update Data user ke database
$sql2 	= "UPDATE user SET nama = '$nama', email = '$email' WHERE id_user = '$id'";
$query2 = mysqli_query($conn, $sql2);

	# Query berhasil, tampilkan pesan berhasil
	if ($query2) {
		echo "<script type='text/javascript'>
			 alert('Berhasil menyimpan perubahan');
			 window.location='user.php';
			 </script>";
	}
}