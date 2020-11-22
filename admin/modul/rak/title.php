<?php include 'comp/header.php'; ?>

<?php 

if (isset($_POST['simpan'])) {
	insert_rak();
}

if (isset($_POST['hapus'])) {
	delete_rak();	
}

if (isset($_POST['edit'])) {
	update_rak();
}

 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Rak</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Rak</li>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah data rak</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label>Kode Rak</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="kdrak" aria-describedby="emailHelp">
  
  </div>
    <div class="form-group">
    <label>Nama Rak</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="namarak" aria-describedby="emailHelp">

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
                    
                        <th>Kode Rak</th>
                        <th>Nama Rak</th>
                       
                        <th>Aksi</th>
                           
                                                
                    </tr>
                  </thead>
                <tbody>     
                    <?php 
                     $i = 1;
                     include 'paging.php';
                      

                     ?>

                             
                </tbody>
                    </table>
                                    
                        </div>
          </div>
          <center><ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?m=rak&s=title&halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php 
                for($x=1;$x<=$total_halaman;$x++){
                    ?> 
                    <li class="page-item"><a class="page-link" href="?m=rak&s=title&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                }
                ?>              
                <li class="page-item">
                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?m=rak&s=title&halaman=$next'"; } ?>>Next</a>
                </li>
            </ul>
              </center> 
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