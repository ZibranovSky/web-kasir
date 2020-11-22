<?php 


include 'sesi.php';
$modul = (isset($_GET['s']))?$_GET['s']:"awal";
$nama_app = " | Web Kasir";
switch ($modul) {
	case 'title': default: $judul = "Menu Laporan Penjualan $nama_app"; include 'title.php'; break;
	
}



 ?>