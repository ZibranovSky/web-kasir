<?php 


include 'sesi.php';
$modul = (isset($_GET['s']))?$_GET['s']:"awal";
$nama_app = " | Kasir Kita";
switch ($modul) {
	case 'title': default: include 'title.php'; break;
	case 'detail': $judul = "Detail User $nama_app"; include 'detail.php'; break;
	
			
}



 ?>