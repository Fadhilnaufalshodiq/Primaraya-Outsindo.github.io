
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Dokumen Penunjang</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="pengguna.php">Home</a></li>
            <li class="breadcrumb-item active">Data Dokumen Penunjang</li>
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
              <h3 class="card-title">Data Dokumen Penunjang </h3>
            </div>
            <div class="card-body">
              <label>Tambah Data Dokumen Penunjang</label>
              <form action="?isi=datadokumen&aksi=tambah" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Nama Dokumen</label>
                      <input type="text" class="form-control" placeholder="Nama Dokumen" name="dokumen" >
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
                  <th>Nama Dokumen</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $qb1=mysqli_query($conn,"SELECT * FROM tb_dokumen");
                  
                    while($b1=mysqli_fetch_array($qb1)){
                      echo "
                      <tr>
                        <td>$b1[nm_dokumen]</td>
                        <td>
                        <a href='?isi=datadokumen&aksi=ubah&id=$b1[id_dokumen]' class='btn btn-primary'><i class='fa fa-edit'></i> Ubah </a> || 
                        <a href='?isi=datadokumen&aksi=hapus&id=$b1[id_dokumen]' class='btn btn-danger'><i class='fa fa-trash'></i> Hapus</a> 
                        </td>
                      </tr>
                      ";
                    }

                  ?>
                
                </tbody>
                <tfoot>
                <tr>
                <th>Nama Dokumen</th>
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
