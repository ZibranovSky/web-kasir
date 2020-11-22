<?php 

  date_default_timezone_set("Asia/Jakarta");
  $tanggalSekarang = date("Y-m-d");
  $jamSekarang = date("h:i a");

	
	require 'fungsi.php';
	global $koneksi;

if (isset($_POST['print'])) {
	
	$total = $_POST['total'];
	$bayar = $_POST['bayar'];
	$kembalian = $_POST['kembalian'];
	$kasir = $_POST['kasir'];

	
}

 ?>

 <center>
 	Terima kasih telah belanja di Toko Kami :)<br>
 	berikut adalah bukti pembayaran belanjaan anda <br>
 	Tanggal : <?= $tanggalSekarang; ?><br>
 	Jam : <?=$jamSekarang;?>
 	. <br><br>

 	<table border="1">
 		<thead>
 			<td>Nama Produk</td>
 			<td>Jumlah Beli</td>
 			<th>Total</th>
 		</thead>

 		<?php 

 		global $koneksi;

 		$select = mysqli_query($koneksi, "SELECT * FROM transaksi_temp");

 		foreach ($select as $key):


 		 ?>

 		<tbody>
 			<tr>
 				<td><?= $key['nm_produk'];?></td>
 				<td><?= $key['jumlah_beli'];?></td>
 				<td><?= rupiah($key['total']);?></td>
 				<?php endforeach; ?>
 			</tr>
 		</tbody>
 	</table>

 	<p>Total : <?= rupiah($total); ?></p>
 	<p>Bayar : <?= rupiah($bayar); ?></p>
 	<p>Kembalian : <?= rupiah($kembalian); ?></p><br>

 	<b>Kasir: </b><p><?=$kasir;?></p>

 </center>
 <script type="text/javascript">
 	window.print();
 </script>