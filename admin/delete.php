<?php

include 'koneksi.php';

if (isset($_GET['id_user'])) {
	header("Location: admin.php");
}

$id  = $_GET['id_user'];

$sql 	= "DELETE FROM user WHERE id_user = '$id'";
$query 	= mysqli_query($conn, $sql);

if ($query) {
	echo "<script type='text/javascript'>
		 alert('Data Berhasil Dihapus');
		 window.location='admin.php';
		 </script>";
}


?>