<?php include 'comp/header.php'; ?> 
<?php 

error_reporting(0);

  date_default_timezone_set("Asia/Jakarta");
  $tanggalSekarang = date("Y-m-d");
  $jamSekarang = date("h:i a");


if (isset($_POST['simpan'])) {
  insert_transaksi();
} 

if (isset($_POST['simpan_transaksi'])) {
    echo "<meta http-equiv='refresh' content='0'>";    
  update_transaksi_1();
}

if (isset($_GET['print'])) {
  header("location: print.php");
}
  
global $koneksi;
$select_2 = mysqli_query($koneksi, "SELECT * FROM transaksi_temp");
$row = mysqli_fetch_array($select_2);


?>
  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
          <div class="col-sm-12">
            <div class="well">
              <!-- button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_produk">
            Cari Produk
          </button>

          <form action="" method="POST">
            <input type="text" name="cari">
            <button type="submit" name="go" class="btn btn-primary">Cari Produk</button>
          </form>

          <!-- search -->
          <?php 
        global $koneksi;
        if (isset($_POST['go'])) {
          $cari = $_POST['cari'];
           $select_c = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE nm_produk LIKE '%".$cari."%'");
        }

        foreach ($select_c as $res):
       
           ?>
          <table>
            <tbody>
              <tr>
                 <td>
                      <?php echo $res['kdproduk']; ?>
                    </td>
                    <td>
                      <?php echo $res['nm_produk']; ?>
                    </td>
                    <td>
                      <?php echo $res['kategori']; ?>
                    </td>

                     <td>
                      <?php echo $res['harga']; ?>
                    </td>
              <?php endforeach; ?>
              </tr>
            </tbody>
          </table>

          <!-- end -->
          <!-- Modal -->
          <div class="modal fade" id="modal_produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST">
        <label>Cari Nama Produk</label>
        <input type="text" name="cari">
        <button type="submit" class="btn btn-primary" data-target="#modal_produk" name="go">Cari</button>
      </form>
        


 <table width="100%" class="table table-hover"  id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        
                                        <th>Stok</th>
                                        <!--<th>Jenis Kelamin</th>
                                        <th>Tempat</th>
                                        <th>Alamat</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                    <?php

                    $data = mysqli_query ($koneksi, " SELECT  *
                                            from 
                                            tb_produk
                                            order by id ASC");
                      $no = 1;

                     
                      foreach ($data as $sa):
                        
                      
                    ?>
                  <tr id="tb_produk" data-kdproduk="<?= $sa['kdproduk'];?>" data-nm_produk="<?= $sa['nm_produk'];?>" data-kategori="<?= $sa['kategori'];?>"  data-harga="<?= $sa['harga'];?>">
                    <td>
                      <?php echo $no++; ?>
                    </td>
                    <td>
                      <?php echo $sa['kdproduk']; ?>
                    </td>
                    <td>
                      <?php echo $sa['nm_produk']; ?>
                    </td>
                    <td>
                      <?php echo $sa['kategori']; ?>
                    </td>

                     <td>
                      <?php echo $sa['harga']; ?>
                    </td>
                  
                  </tr>
                  <?php
                    endforeach;
                  ?>
                            </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
      </div>
       
    </div>
  </div>
</div>
            </div>
          </div>  
        </div>
        
        <br>

        <!-- form pesanan keranjang -->
      
      <form action="" method="POST" class="mb-2">
        <input type="text" readonly="" class="" required="" name="kdproduk" id="kdproduk" class="" placeholder="Kode Produk">
        <input type="text" readonly="" name="nm_produk" id="nm_produk" class="" placeholder="Nama Produk">
        <input type="text" readonly="" name="kategori" id="kategori" class="" placeholder="Kategori">
        <input type="text" readonly="" name="harga" id="harga" class="" placeholder="Harga">
        <input type="hidden" name="tanggal" value="<?= $tanggalSekarang;?>">
        <input type="hidden" name="jam" value="<?= $jamSekarang; ?>">
        <input type="hidden" name="kasir" value="<?= $key['nama']; ?>">
        <input type="submit" name="simpan" class="btn btn-success" value="simpan">
      </form>
       <div class="row">
        <div class="col-sm-12">
          <div class="well">
             <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                  <thead>
                    <tr>
                        <th>NO</th> 
                    
                        
                        <th>Nama Produk</th>
                       
                        <th>Jumlah Beli</th>
                        <th>Harga</th>
                        
                        <th>aksi </th>
                           
                                                
                    </tr>
                  </thead>
                <tbody>     
                    <?php 
                      $i = 1;
                      global $koneksi;
                      $select = mysqli_query($koneksi, "SELECT * FROM transaksi_temp");
                      foreach ($select as $krj):                     
                     ?>
                          <tr>
                              <td><?= $i++;?></td>
                            
                               
                               
                              
                              <td><?= $krj['nm_produk'];?></td>
                              <td>
                                  <form action="" method="POST"> 
                                   <input type="text" value="<?= $krj['jumlah_beli']; ?>"  name="jumlah_beli" >
                              </td>
                              <td>
                                <input type="text" value="<?= $krj['id'];?>" name="id" hidden>
                                <input type="text" name="kdproduk" value="<?= $krj['kdproduk'];?>">
                             
                                <input type="text" value="<?= $krj['total'];?>" readonly name="harga">
                                <?php 

                                global $koneksi;
                                $select_stok = mysqli_query($koneksi, "SELECT * FROM tb_produk");
                                $stok = mysqli_fetch_array($select_stok);

                                 ?>
                                <input type="hidden" name="stok" value="<?= $stok['stok'];?>">
                              </td>

                            
                              <td><input type="submit" name="simpan_transaksi" value="ubah" class="btn btn-primary">
                                  <a href="delete.php?id=<?= $krj['id'];?>">hapus</a>
                              </td>  
                       
                            <?php endforeach; ?>
                              </tr>
                               </form>
                </tbody>
                    </table>
                                    
                        </div>
                        <br>
                   <?php 

                        if (!empty(isset($_POST['bayar_submit']))) {
                          global $koneksi;
                          $total = $_POST['total'];
                          $bayar = $_POST['bayar'];

                      


                          // kembalian + hitung
                          
                          if ($bayar < $total) {
                            $kurang = $total - $bayar;
                            echo '<div class="alert alert-danger" role="alert">
                                         uang anda kurang '.rupiah($kurang).' !
                                        </div>';

                          }else{
                          $kembalian = $bayar - $total;  
                          }
                          




                        }

                         ?>
                          <form action="" method="POST">
                          <label>total</label>
                          <?php 
                          global $koneksi;
                          $query = mysqli_query($koneksi, "SELECT sum(total) as jtotal FROM transaksi_temp");
                          $r = mysqli_fetch_array($query);
                           ?>
                          <input type="text" name="total" value="<?= $r['jtotal']; ?>">
                          <label>bayar</label>
                          <input type="text" name="bayar">
                          <button type="submit" class="btn btn-success" required name="bayar_submit">bayar</button>
                          <label>kembalian</label>
                          <input type="text" name="kembalian" value="<?= $kembalian; ?>">

                        </form>

                        <!-- Print -->

                          <form action="fungsi/print.php" target="_BLANK" method="POST">
                             
                          <?php 
                          global $koneksi;
                          $query = mysqli_query($koneksi, "SELECT sum(total) as jtotal, sum(stok) as jstok FROM transaksi_temp");
                          $r = mysqli_fetch_array($query);
                           ?>
                          <input type="hidden" name="total" value="<?= $r['jtotal']; ?>">
                        
                          <input type="hidden" name="bayar" value="<?= $bayar;?>">
                         
                        
                          <input type="hidden" name="kembalian" value="<?= $kembalian; ?>">

                          


                          <table class="table-responsive">
                            <tr>
                              <td>Print Data</td>
                              <td><a href="index.php"><button type="submit" name="print" class="btn btn-primary">Print Data</button></a></td>
                            </tr>
                          </table>
                          </form>


                        <!-- END Print -->
          </div>
        </div>
        <?php  ?>
      </div> 
        <!-- /.row -->
        <!-- Main row -->
      
          </section>

              <!-- /.card-body -->
              
            <!-- /.card -->

            <!-- solid sales graph -->
           </div>
      
<?php include 'comp/footer.php'; ?>