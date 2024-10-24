
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Bagian</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="pengguna.php">Home</a></li>
            <li class="breadcrumb-item active">Data Bagian</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Bagian </h3>
            </div>
            <div class="card-body">
              <label>Tambah Data Bagian</label>
              <form action="?isi=databagian&aksi=tambah" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Nama Bagian</label>
                      <input type="text" class="form-control" placeholder="Masukan Nama Bagian" name="bagian" >
                    </div>
                  </div>                  
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
              <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Bagian</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $qb1=mysqli_query($conn,"SELECT * FROM tb_bagian WHERE nm_bagian!='Super Admin'");
                  
                    while($b1=mysqli_fetch_array($qb1)){
                      echo "
                      <tr>
                        <td>$b1[nm_bagian]</td>
                        <td>
                        <a href='?isi=databagian&aksi=ubah&id=$b1[id_bagian]' class='btn btn-primary'><i class='fa fa-edit'></i> Ubah </a> || 
                        <a href='?isi=databagian&aksi=hapus&id=$b1[id_bagian]' class='btn btn-danger'><i class='fa fa-trash'></i> Hapus</a> 
                        </td>
                      </tr>
                      ";
                    }

                  ?>
                
                </tbody>
                <tfoot>
                <tr>
                    <th>Nama Bagian</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
</section>
  <!-- /.content -->
</div>            
