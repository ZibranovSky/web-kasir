<?php 

include 'sesi.php';
$modul = (isset($_GET['s']))?$_GET['s']:"awal";
$nama_app = " | Web Kasir";
switch ($modul) {
	case 'title': $judul = "Menu Produk $nama_app"; include 'title.php'; break;
	
	default:
		# code...
		break;
}



 ?>