<?php

$page = (isset($_GET['page']))?$_GET['page'] : '';

switch ($page) {
	case 'dashboard':
		include 'admin/dashboard.php';
		break;
	case 'user':
		include 'admin/user.php';
		break;	
	case 'laporan':
		include 'admin/laporan.php';
		break;
	case 'proses-lapor':
		include 'admin/proses-laporan.php';
		break;
	case 'selesai-lapor':
		include 'admin/laporan-selesai.php';
		break;			
	
	case 'profile':
		include 'admin/profile.php';
		break;
	case 'edit-profile':
		include 'admin/edit-profile.php';
		break;
	case 'change-pass':
		include 'admin/change-pass.php';
		break;
	case 'delete':
		include 'admin/delete.php';
		break;
	case 'update-status':
		include 'admin/status.php';
		break;
	case 'hapus-laporan':
		include 'admin/hapus-laporan.php';
		break;
	case 'detail-laporan':
		include 'admin/detail-laporan.php';
		break;					

	default:
		include 'admin/dashboard.php';
		break;
}

?>