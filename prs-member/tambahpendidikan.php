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
            <h1 class="m-0">Tambah Data Pendidikan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="cust.php">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Pendidikan</li>
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
                  Tambah Pendidikan
                </h3>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                <form action="?isi=pendidikan&aksi=tambah" method="post" >
                  <input type="hidden" value="<?php echo "$_SESSION[idpel]"; ?>" name="id_pelamar">
                <div class="row">
                  
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        
                  <label>Pilih Jenjang Pendidikan</label>
                  <select name="jenjang" class="form-control" style="width: 100%;" >
                    <option selected="selected">Piih Jenjang</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA/SMK</option>
                    <option value="D1">D1</option>
                    <option value="D3">D3/D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                  </select>
                </div>
                    </div>
                    <div class="col-sm-8">
                      <!-- text input -->
                      <div class="form-group">
                        <div class="form-group">
                        <label>Nama Sekolah</label>
                        <input type="text" class="form-control" name="nama_sekolah" placeholder="Nama Sekolah">
                      </div>
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <!-- text input -->
                      <div class="form-group">
                        <div class="form-group">
                        <label>Kota</label>
                        <input type="text" class="form-control" name="kota" placeholder="Kota">
                      </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <div class="form-group">
                        <label>Program Studi</label>
                        <input type="text" class="form-control" name="program_studi" placeholder="Program Studi">
                      </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <div class="form-group">
                        <label>NEM/IPK</label>
                        <input type="number" class="form-control" name="nem_ipk" placeholder="4,00">
                      </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <div class="form-group">
                        <label>Tahun Lulus</label>
                        <input type="number" class="form-control" name="tahun" placeholder="1999">
                      </div>
                      </div>
                    </div>
              </div>
              <button type="submit" class="btn btn-primary">Tambah</button>
              <a href='?isi=pendidikan' class='btn btn-danger'> Kembali </a> 
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
