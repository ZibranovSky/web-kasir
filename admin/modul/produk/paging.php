<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'kasir_zibran');
global $koneksi;

    $batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_produk");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);


$nomor = $halaman_awal+1;


// cari
if (isset($_POST['go'])) {
  $cari = $_POST['cari'];
  $data_siswa = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE nm_produk LIKE '%".$cari."%'");
}else{
  $data_siswa = mysqli_query($koneksi, "SELECT * FROM tb_produk LIMIT $halaman_awal, $batas");
}


foreach ($data_siswa as $pro):
  ?>
    



<tr>
                              <td><?= $i++;  ?></td>
                              <td><?=  $pro['kdproduk'];?></td>
                              <td><?=  $pro['nm_produk'];?></td>
                              <td><?= $pro['kategori'];?></td>
                              <td><?=  $pro['stok'];?></td>
                              <td><?= $pro['rak'];?></td>
                               <td><?= $pro['supplier'];?></td>

                              <td><?php 

                              if ($pro['stok'] > 0) {
                                echo '<p style="color: green;">ada</p>';
                              }else if($pro['stok']==0){
                                echo '<p style="color: red;">habis</p>';
                              }

                              ?></td>
                              <td><?= rupiah($pro['harga']); ?></td>

                              
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
                          <b><p class="modal-title" id="hapus-produk<?= $pro['id'] ?>" style="text-align: center; font-size: 18px;">Apakah anda yakin?</p></b>
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
                         <p>Harga</p>
                        <b><p><?= rupiah($pro['harga']); ?></p></b>
                       
                        
                       
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
                    
                    <!-- Trigger Modal Edit -->
                  <div data-toggle="modal" data-target="#edit-produk<?= $pro['id'] ?>">
                  <button type="button" class="btn btn-info datapotensi" data-toggle="tooltip" title="Edit">
                    <i class="fa fa-edit"></i>
                  </button>
                </div>

                              <!-- Modal Edit-->
          <div class="modal fade" id="edit-produk<?= $pro['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit-produk<?= $pro['id'] ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <b><p class="modal-title" id="edit-siswa<?= $pro['id'] ?>" style="text-align: center; font-size: 18px;">Edit Data Produk</p></b>
                </div>
                <div class="modal-body">
                 <form action="" method="POST" enctype="multipart/form-data">
                  <input type="hidden" value="<?= $pro['id'];?>" name="id">
  <div class="form-group">
    <label>Kode Produk</label>
    <input type="text" class="form-control" value="<?= $pro['kdproduk'];?>" id="exampleInputEmail1" name="kdproduk" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label>Nama Produk</label>
    <input type="text" class="form-control" name="nm_produk" value="<?= $pro['nm_produk'];?>">
  </div> 
    <div class="form-group">
    <label>Kategori Produk</label>
    <input type="text" class="form-control" value="<?= $pro['kategori'];?>" readonly>
  </div> 
  <div class="form-group">

   <input type="text" name="stok" class="form-control" hidden value="<?= $pro['stok']; ?>" >
    
  </div><br>

    <div class="form-group">
    
  <select name="kategori" class="form-control">
      <?php 
      global $koneksi;
      $kategori = mysqli_query($koneksi, "SELECT * FROM tb_kat");
      foreach ($kategori as $kat):
       ?>
       <option><?= $kat['kategori'];?></option><?php endforeach; ?>
  </select>
  </div> 


 <div class="form-group">
    <label>Rak</label>
  <input type="text" class="form-control" id="exampleInputEmail1" readonly="" value="<?= $pro['rak'];?>" aria-describedby="emailHelp" ><br>
  <select class="form-control" name="rak">
    <?php 
    global $koneksi;
    $query = mysqli_query($koneksi, "SELECT * FROM tb_rak");
      foreach ($query as $suprak):
     ?>
     <option><?= $suprak['namarak']?></option><?php endforeach; ?>
  </select>
    
  </div>

  <div class="form-group">
    <label>Supplier</label>
  <input type="text" class="form-control" id="exampleInputEmail1" readonly=""  value="<?= $pro['supplier'];?>" aria-describedby="emailHelp"><br>
  <select class="form-control" name="supplier">
    <?php 
    global $koneksi;
    $query = mysqli_query($koneksi, "SELECT * FROM tb_supplier");
      foreach ($query as $suprak):
     ?>
     <option><?= $suprak['namaspl']?></option><?php endforeach; ?>
  </select>
    
  </div>

   <div class="form-group">
    <label>Harga Produk</label>
    <input type="text" class="form-control" name="harga" value="<?= $pro['harga'];?>">
  </div>
  


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
                </div>
              </div>
            </div>

                              </td>
                              </tr>
                              <?php endforeach; ?>
