<?php 


include 'sesi.php';
$modul = (isset($_GET['s']))?$_GET['s']:"awal";
$nama_app = " | Web Kasir";
switch ($modul) {
	case 'Kategori': default: $judul = "Menu Kategori $nama_app"; include 'title.php'; break;

}




 ?>