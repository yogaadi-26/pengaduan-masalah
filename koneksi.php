<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "edumas";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
	echo "<script> 
		  alert('Koneksi Gagal'); 
		  </script>";
}

?>