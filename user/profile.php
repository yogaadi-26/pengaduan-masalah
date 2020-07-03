<?php

include ("koneksi.php");

if (!isset($_GET['id_user'])) {
  header("Location: user.php");
}

# Ambil id user dari URL
$id   = $_GET['id_user'];

# query SQL SELECT dari Database
$sql    = "SELECT * FROM user WHERE id_user = '$id'";
$query  = mysqli_query($conn, $sql);
$profil = mysqli_fetch_assoc($query);

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
            <h1 class="m-0 text-dark">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Profile</li>
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
                <h5 class="m-0">User Profile</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">ID User</label>
                    <div class="col-sm-8">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $profil['id_user']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-8">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $profil['nama']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-8">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $profil['email']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-8">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= ucfirst($profil['level']); ?>">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <a href="user.php?page=edit-profile&id_user=<?= $profil['id_user']; ?>" class="btn btn-primary mr-2">Edit Profile</a>
                    <a href="user.php?page=change-pass&id_user=<?= $profil['id_user']; ?>" class="btn btn-secondary">Change Password</a>
                  </div>
              </div>
            </div>

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->