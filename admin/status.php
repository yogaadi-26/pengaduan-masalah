<?php

if (!isset($_GET['id_laporan'])) {
	header("Location: admin.php");
}

$id = $_GET['id_laporan'];

$sql 	= "UPDATE laporan SET status = '2' WHERE id_laporan = '$id'";
$query 	= mysqli_query($conn, $sql);

if ($query) {
	echo "<script type='text/javascript'>
       alert('Berhasil menyimpan perubahan');
       window.location='admin.php';
       </script>";
    }

?>