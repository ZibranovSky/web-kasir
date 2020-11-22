<?php 

$koneksi = mysqli_connect('localhost', 'root', '', 'kasir_kita');

$id = $_GET['id'];
$delete =  mysqli_query($koneksi, "DELETE FROM transaksi_temp WHERE id='$id'");

if ($delete) {
	echo '<script>window.history.back()</script>';
}


 ?>