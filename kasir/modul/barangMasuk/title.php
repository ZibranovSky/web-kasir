<?php include 'comp/header.php'; ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Laporan Penjualan</h1>
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
        			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
					  Tambah data
					</button>

					<!-- Modal -->
					<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah data user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Masukkan Username">
  
  </div>
    <div class="form-group">
    <label>Password</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="password" aria-describedby="emailHelp" placeholder="Masukkan Password">

  </div>
    <div class="form-group">
    <label>Nama User</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" placeholder="Masukkan Nama User">
 
  </div>
    <div class="form-group">
    <label>Level</label>
    <select name="level" class="form-control">
    	<option>admin</option>
      <option>logistik</option>
    	<option>kasir</option>
    </select>
  
  </div>
    <div class="form-group">
    <label>Foto</label>
    <input type="file" name="foto" placeholder="Masukkan Foto"><br>
    <span>Foto boleh kosong</span>
    
  </div>
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>
        		</div>
        	</div>	
        </div>

       <div class="row">
        <div class="col-sm-12">
          <div class="well">
             <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                  <thead>
                    <tr>
                        <th>NO</th> 
                    
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Jumlah Beli</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Kasir</th>
                        <th>Aksi</th>
                           
                                                
                    </tr>
                  </thead>
                <tbody>     
                    <?php 
                      $i = 1;
                      foreach (select_laporan() as $key):

                     ?>
                          <tr>
                              <td><?= $i++;?></td>
                             
                              <td><?=  $key['kdproduk'];?></td>
                              <td><?= $key['nm_produk'];?></td>
                              <td><?= $key['kategori'];?></td>
                              <td><?= $key['jumlah_beli'];?></td>
                              <td><?= $key['total'];?></td>
                              <td><?= $key['tanggal'];?></td>
                              <td><?= $key['jam'];?></td>
                              <td><?= $key['kasir'];?></td>
                              
                              <td>
                               <!-- Trigger Modal Hapus -->
                              <div data-toggle="modal" data-target="#hapus-admin<?= $key['id'] ?>">
                              <button type="button" class="btn btn-danger datapotensi" data-toggle="tooltip" title="Hapus">
                              <i class="fa fa-trash"></i>
                              </button>
                              </div>

                              <!-- Modal Hapus -->
                            <form action="" method="POST">
                      <div class="modal fade" id="hapus-admin<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapus-admin<?= $key['nis'] ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <b><p class="modal-title" id="hapus-admin<?= $key['id'] ?>" style="text-align: center; font-size: 18px;">Apakah anda yakin ingin dihapus?</p></b>
                        </div>
                        <div class="modal-body">
                          <div class="modal-body">
                   
                        <p>Nama User</p>
                        <b><p><?= $key['nama']; ?></p></b>

                        <p>Level User</p>
                        <b><p><?= $key['level']; ?></p></b>

                        <p>Foto User</p>
                                                      	<?php 

                              	if ($key['foto']!='') {
                              		echo '<img src="img/'.$key['foto'].'" height="150">';
                              		
                              	}else{
                              		echo '<img src="img/user_logo.png" height="150">';
                              	}



                              	 ?>
                        
                       
                        
                       
                          <input type="hidden" name="id" value="<?= $key['id'] ?>" class="form-control" hidden>
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
                  <div data-toggle="modal" data-target="#edit-siswa<?= $key['id'] ?>">
                  <button type="button" class="btn btn-info datapotensi" data-toggle="tooltip" title="Edit">
                    <i class="fa fa-edit"></i>
                  </button>
                </div>

                              <!-- Modal Edit-->
          <div class="modal fade" id="edit-siswa<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit-siswa<?= $key['id'] ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <b><p class="modal-title" id="edit-siswa<?= $key['id'] ?>" style="text-align: center; font-size: 18px;">Edit Data Siswa</p></b>
                </div>
                <div class="modal-body">
                 <form action="" method="POST" enctype="multipart/form-data">
                  <input type="hidden" value="<?= $key['id'];?>" name="id">
  <div class="form-group">
    <label>Nama Kelas</label>
    <input type="text" class="form-control" value="<?= $key['nama_kelas'];?>" id="exampleInputEmail1" name="nama_kelas" aria-describedby="emailHelp" placeholder="Masukkan nama">
    <small class="form-text text-muted">Masukkan nama kelas</small>
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
                </tbody>
                    </table>
                                    
                        </div>
          </div>
        </div>

      </div> 
        <!-- /.row -->
        <!-- Main row -->
      
          </section>
              <!-- /.card-body -->
              
            <!-- /.card -->

            <!-- solid sales graph -->
           </div>
<?php include 'comp/footer.php'; ?>