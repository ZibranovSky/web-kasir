<?php 

include 'sesi.php';
$modul = (isset($_GET['s']))?$_GET['s']:"awal";
$nama_app = " | Web Kasir";
switch ($modul) {
	case 'title': default: $judul = "Produk Masuk $nama_app"; include 'title.php'; break;
	case 'produkmasuk': $judul = "Produk Masuk $nama_app"; include 'produkmasuk.php'; break;
	
		# code...
		break;
}


 ?>