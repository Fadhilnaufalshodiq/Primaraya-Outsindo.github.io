<?php

$qb1=mysqli_query($conn,"SELECT * FROM tb_pelamar WHERE id_pelamar='$_SESSION[idpel]'");
$b1=mysqli_fetch_array($qb1);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Data Pengalaman</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="cust.php">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Pengalaman</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-8 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-user"></i>
                  Tambah Pengalaman Kerja
                </h3>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                <form action="?isi=pengalaman&aksi=tambah" method="post" >
                  <input type="hidden" value="<?php echo "$_SESSION[idpel]"; ?>" name="id">
                <div class="row">
                  
                  <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <div class="form-group">
                        <label>Tahun Bekerja</label>
                        <input type="number" class="form-control" name="tahun" placeholder="Tahun Bekerja">
                      </div>
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <!-- text input -->
                      <div class="form-group">
                        <div class="form-group">
                        <label>Perusahaan/Instansi</label>
                        <input type="text" class="form-control" name="perusahaan" placeholder="Perusahaan/Instansi">
                      </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <div class="form-group">
                        <label>Pekerjaan/Jabatan</label>
                        <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan/Jabatan">
                      </div>
                      </div>
                    </div>
                    
              </div>
              <button type="submit" class="btn btn-primary">Tambah</button>
              <a href='?isi=pengalaman' class='btn btn-danger'> Kembali </a> 
                <!-- /.card-body -->
                </form>
              </div><!-- /.card-body -->
            </div>
            
              
           <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
