<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'kasir_zibran');
global $koneksi;

    $batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_prod_masuk");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);


$nomor = $halaman_awal+1;


// cari
if (isset($_POST['go'])) {
  $cari = $_POST['cari'];
  $data_pro_ma = mysqli_query($koneksi, "SELECT * FROM tb_prod_masuk WHERE nama LIKE '%".$cari."%'");
}else{
  $data_pro_ma = mysqli_query($koneksi, "SELECT * FROM tb_prod_masuk LIMIT $halaman_awal, $batas");
}


foreach ($data_pro_ma as $pro):
  ?>
    



<tr>
                              <td><?= $i++;  ?></td>
                              <td><?=  $pro['noinv'];?></td>
                              <td><?=  $pro['tanggal'];?></td>
                              <td><?= $pro['jam'];?></td>
                              <td><?=  $pro['kdproduk'];?></td>
                              <td><?= $pro['nm_produk'];?></td>
                               <td><?= $pro['kategori'];?></td>
                               <td><?=  $pro['rak'];?></td>
                              <td><?=  $pro['supplier'];?></td>
                              <td><?= $pro['stok'];?></td>
                              <td><?=  $pro['jml_masuk'];?></td>
                              <td><?= $pro['admin'];?></td>
                        
                            

                              
                              <td>
                                <!-- Trigger Modal Hapus -->
                              <div data-toggle="modal" data-target="#hapus-produk<?= $pro['id'] ?>">
                              <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Hapus">
                              <i class="fa fa-trash"></i>
                              </button>
                              </div>

                              <!-- Modal Hapus -->
                            <form action="" method="POST">
                      <div class="modal fade" id="hapus-produk<?= $pro['id'] ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <b><p class="modal-title" id="hapus-produk<?= $pro['id'] ?>" style="text-align: center; font-size: 18px;">Apakah anda yakin ingin dihapus?</p></b>
                        </div>
                        <div class="modal-body">
                          <div class="modal-body">
                   
                            <p>Kode Produk</p>
                        <b><p><?= $pro['kdproduk'] ?></p></b>
                        <p>Nama Produk</p>
                        <b><p><?= $pro['nm_produk']; ?></p></b>
                        <p>Stok</p>
                        <b><p><?= $pro['stok']; ?></p></b>
                          <p>Rak</p>
                        <b><p><?= $pro['rak']; ?></p></b>
                         <p>Supplier</p>
                        <b><p><?= $pro['supplier']; ?></p></b>
                         <p>Status</p>
                        <b><p><?php 

                        if ($pro['stok']==0) {
                          echo '<p style="color: red;">habis</p>';
                        }else{
                            echo '<p style="color: green;">ada</p>';
                        }

                         ?></p></b>
                        
                       
                        
                       
                          <input type="hidden" name="id" value="<?= $pro['id'] ?>" class="form-control" hidden>
                          </div>
                         
                        </div>
                        <div class="modal-footer">
                          <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                      </div>
                    </div>
                  </div>
                    </form><br>
                    
                  

                              </td>
                              </tr>
                              <?php endforeach; ?>
