
<?php include 'comp/header.php'; ?>
<?php 

if (isset($_POST['simpan'])) {
	insert_user();
}

if (isset($_POST['hapus'])) {
	delete_user();
}
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
              <li class="breadcrumb-item active">User</li>
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
    <input type="text" autofocus="" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
  
  </div>
    <div class="form-group">
    <label>Password</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="password" aria-describedby="emailHelp" >

  </div>
    <div class="form-group">
    <label>Nama User</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp">
 
  </div>
    <div class="form-group">
    <label>Level</label>
    <select name="level" class="form-control">
    	<option>admin</option>
 
    	<option>kasir</option>
    </select>
  
  </div>
    <div class="form-group">
    <label>Foto</label>
    <input type="file" name="foto"><br>
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
                    
                        <th>Nama</th>
                        <th>Level</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                           
                                                
                    </tr>
                  </thead>
                <tbody>     
                    <?php 
                      $i = 1;
                      foreach (select_user() as $adm):

                     ?>
                          <tr>
                              <td><?= $i++;?></td>
                         
                              <td><?=  $adm['nama'];?></td>
                              <td><?php if ($adm['level']=="admin") {
                              	echo '<b><p style="color: green;">admin</p></b>';
                              }else if($adm['level']=="kasir"){
                              	echo '<b><p style="color: blue;">kasir</p></b>';
                              }elseif ($adm['level']=="logistik") {
                                echo '<b><p style="color: orange;">logistik</p></b>';
                              } 

                              ?>
                              	
                              </td>
                              <td>
                              	<?php 

                              	if ($adm['foto']!='') {
                              		echo '<img src="img/'.$adm['foto'].'" height="150">';
                              		
                              	}else{
                              		echo '<img src="img/user_logo.png" height="150">';
                              	}



                              	 ?>

                              </td>
                              <td>
                               <!-- Trigger Modal Hapus -->
                              <div data-toggle="modal" data-target="#hapus-admin<?= $adm['id'] ?>">
                              <button type="button" class="btn btn-danger datapotensi" data-toggle="tooltip" title="Hapus">
                              <i class="fa fa-trash"></i>
                              </button>
                              </div>

                              <!-- Modal Hapus -->
                            <form action="" method="POST">
                      <div class="modal fade" id="hapus-admin<?= $adm['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <b><p class="modal-title" id="hapus-admin<?= $adm['id'] ?>" style="text-align: center; font-size: 18px;">Apakah anda yakin?</p></b>
                        </div>
                        <div class="modal-body">
                          <div class="modal-body">
                   
                        <p>Nama User</p>
                        <b><p><?= $adm['nama']; ?></p></b>

                        <p>Level User</p>
                        <b><p><?= $adm['level']; ?></p></b>

                        <p>Foto User</p>
                                                      	<?php 

                              	if ($adm['foto']!='') {
                              		echo '<img src="img/'.$adm['foto'].'" height="150">';
                              		
                              	}else{
                              		echo '<img src="img/user_logo.png" height="150">';
                              	}



                              	 ?>
                        
                       
                        
                       
                          <input type="hidden" name="id" value="<?= $adm['id'] ?>" class="form-control" hidden>
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