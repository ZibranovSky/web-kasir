<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'kasir_zibran');
global $koneksi;

    $batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_rak");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);


$nomor = $halaman_awal+1;


// cari
if (isset($_POST['go'])) {
  $cari = $_POST['cari'];
  $data_rak = mysqli_query($koneksi, "SELECT * FROM tb_rak WHERE namarak LIKE '%".$cari."%'");
}else{
  $data_rak = mysqli_query($koneksi, "SELECT * FROM tb_rak LIMIT $halaman_awal, $batas");
}


foreach ($data_rak as $pro):
  ?>
    



<tr>
                              <td><?= $i++;  ?></td>
                              <td><?=  $pro['kdrak'];?></td>
                              <td><?=  $pro['namarak'];?></td>
                              

                              
                              <td>
                                <!-- Trigger Modal Hapus -->
                              <div data-toggle="modal" data-target="#hapus-rak<?= $pro['id'] ?>">
                              <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Hapus">
                              <i class="fa fa-trash"></i>
                              </button>
                              </div>

                              <!-- Modal Hapus -->
                            <form action="" method="POST">
                      <div class="modal fade" id="hapus-rak<?= $pro['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <b><p class="modal-title" id="hapus-rak<?= $pro['id'] ?>" style="text-align: center; font-size: 18px;">Apakah anda yakin ingin dihapus?</p></b>
                        </div>
                        <div class="modal-body">
                          <div class="modal-body">
                   
                            <p>Kode Rak</p>
                        <b><p><?= $pro['kdrak'] ?></p></b>
                        <p>Nama Rak</p>
                        <b><p><?= $pro['namarak']; ?></p></b>
                      
                       
                        
                       
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
                  <div data-toggle="modal" data-target="#edit-rak<?= $pro['id'] ?>">
                  <button type="button" class="btn btn-info datapotensi" data-toggle="tooltip" title="Edit">
                    <i class="fa fa-edit"></i>
                  </button>
                </div>

                              <!-- Modal Edit-->
          <div class="modal fade" id="edit-rak<?= $pro['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <b><p class="modal-title" id="edit-rak<?= $pro['id'] ?>" style="text-align: center; font-size: 18px;">Edit Data Raak</p></b>
                </div>
                <div class="modal-body">
                 <form action="" method="POST" enctype="multipart/form-data">
                  <input type="hidden" value="<?= $pro['id'];?>" name="id">
  <div class="form-group">
    <label>Kode Rak</label>
    <input type="text" class="form-control" value="<?= $pro['kdrak'];?>" id="exampleInputEmail1" name="kdrak" aria-describedby="emailHelp" placeholder="Masukkan nama">
    <small class="form-text text-muted">Masukkan Kode Rak</small>
  </div>
  <div class="form-group">
    <label>Nama Rak</label>
   	<input type="text" name="namarak" value="<?= $pro['namarak']; ?>" class="form-control">
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
