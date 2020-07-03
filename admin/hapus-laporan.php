<?php

include 'koneksi.php';

if (!isset($_GET['id_laporan'])) {
	header("Location: admin.php");
}

$id = $_GET['id_laporan'];

$sql 	= "DELETE FROM laporan WHERE id_laporan = '$id'";
$query	= mysqli_query($conn, $sql);

if ($query) {
	echo "<script type='text/javascript'>
       alert('Data Berhasil Dihapus');
       window.location='admin.php';
       </script>";
    }

?>