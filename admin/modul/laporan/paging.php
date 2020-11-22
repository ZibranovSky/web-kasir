<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'kasir_zibran');
global $koneksi;

    $batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM laporan_penjualan");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);


$nomor = $halaman_awal+1;


// cari
if (isset($_POST['go'])) {
  $cari = $_POST['cari'];
  $data_laporan = mysqli_query($koneksi, "SELECT * FROM laporan_penjualan WHERE nm_produk LIKE '%".$cari."%'");
}else{
  $data_laporan = mysqli_query($koneksi, "SELECT * FROM laporan_penjualan LIMIT $halaman_awal, $batas");
}


foreach ($data_laporan as $pro):
  ?>
    



<tr>
                             <td><?= $i++;?></td>
                         
                              <td><?=  $pro['kdproduk'];?></td>
                              <td><?= $pro['nm_produk'];?></td>
                              <td><?= $pro['kategori'];?></td>
                              <td><?= $pro['jumlah_beli'];?></td>
                              <td><?= $pro['total'];?></td>
                              <td><?= $pro['tanggal'];?></td>
                              <td><?= $pro['jam'];?></td>
                              <td><?= $pro['kasir'];?></td>
                              
                              
                              </tr>
                              <?php endforeach; ?>
