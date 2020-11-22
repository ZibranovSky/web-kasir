
<?php 


include_once 'sesi.php';
$nama_app = " | Kasir Kita";
$modul = (isset($_GET['m']))?$_GET['m']:"awal";

switch ($modul) {
	
	case 'title': default: $judul="Beranda Logistik $nama_app"; include "title.php"; break;
	
	case 'produk': $judul="Menu Produk $nama_app"; include 'modul/produk/index.php'; break;
	case 'rak': $judul="Menu Rak $nama_app"; include 'modul/rak/index.php'; break;
	case 'supplier': $judul="Menu Supplier $nama_app"; include 'modul/supplier/index.php'; break; 			
	
	
}


 ?>


