<?php

$page = (isset($_GET['page']))?$_GET['page'] : '';

switch ($page) {
	case 'beranda':
		include 'user/beranda.php';
		break;
	case 'profile':
		include 'user/profile.php';
		break;
	case 'edit-profile':
		include 'user/edit-profile.php';
		break;
	case 'change-pass':
		include 'user/change-pass.php';
		break;
	case 'lapor':
		include 'user/lapor.php';
		break;
	case 'status-laporan':
		include 'user/status-laporan.php';
		break;
	case 'detail-laporan':
		include 'user/detail-laporan.php';
		break;		

	default:
		include 'user/beranda.php';
		break;
}

?>	