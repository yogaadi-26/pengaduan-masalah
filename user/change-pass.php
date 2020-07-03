<?php

include ("koneksi.php");

if (!isset($_GET['id_user'])) {
  header("Location: user.php");
}

# Ambil id_user dari URL
$id   = $_GET['id_user'];

# Query SQL SELECT dari Database
$sql      = "SELECT * FROM user WHERE id_user = '$id'";
$query    = mysqli_query($conn, $sql);
$profil   = mysqli_fetch_assoc($query);
$oldpass  = $profil['password'];

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
            <h1 class="m-0 text-dark">Change Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Profile</li>
              <li class="breadcrumb-item">Change Pass</li>
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
                <h5 class="m-0">Change Password</h5>
              </div>
              <div class="card-body">
                <form action="" method="post">
                  <input type="hidden" name="id" value="<?= $profil['id_user']; ?>">
                  <div class="form-group row">
                    <label for="passlama" class="col-sm-2 col-form-label">Password Lama</label>
                    <div class="col-sm-8">
                      <input type="password" name="passlama" class="form-control" name="passlama" id="passlama">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="passwordbaru" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-8">
                      <input type="password" name="passbaru" class="form-control" id="passwordbaru">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="passwordbaru2" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                    <div class="col-sm-8">
                      <input type="password" name="passbaru2" class="form-control" id="passwordbaru2">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-8 mt-2 pb-3">  
                      <input type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Simpan Perubahan?');">
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
  $id         = $_POST['id'];
  $passlama   = htmlspecialchars(md5($_POST['passlama']));
  $passbaru   = htmlspecialchars(md5($_POST['passbaru']));
  $passbaru2  = htmlspecialchars(md5($_POST['passbaru2']));

# Validasi ubah password  
  if ($passlama != $oldpass) {
    # Jika password lama tidak sesuai
    echo "<script type='text/javascript'>
       alert('Password lama salah');
       window.location='user.php';
       </script>";   
    return false;
  }

  if ($passbaru != $passbaru2) {
    # Jika password baru dan konfirmasi tidak sesuai
    echo "<script type='text/javascript'>
       alert('Konfirmasi password salah');
       window.location='user.php';
       </script>";   
    return false; 
  }

# Update Data user ke database 
$sql2     = "UPDATE user SET password = '$passbaru2' WHERE id_user = '$id'";
$query2   = mysqli_query($conn, $sql2);

  # Query berhasil, Tampilkan pesan berhasil
  if ($query2) {
    echo "<script type='text/javascript'>
       alert('Berhasil menyimpan perubahan');
       window.location='user.php';
       </script>";
  }
}
  
?>  