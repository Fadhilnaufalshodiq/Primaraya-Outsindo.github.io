<?php
if(isset($_GET['aksi'])){
  $aksi="$_GET[aksi]";
}else{
  $aksi="";
}

if($aksi=="tambah"){
  if(empty($_POST['tahun']) OR empty($_POST['perusahaan']) OR empty($_POST['pekerjaan'])){
		echo "
        <script>
            alert('Data Belum Lengkap');
            window.location.href='?isi=pengalaman;
        </script>
        ";
	}else{
	mysqli_query($conn,"INSERT INTO `tb_pengalaman` 
		(id_pelamar,`tahun`,`perusahaan`,`pekerjaan`) VALUES 
		('$_SESSION[idpel]','$_POST[tahun]','$_POST[perusahaan]','$_POST[pekerjaan]')");
		echo "
        <script>
            alert('Data Berhasil Disimpan');
            window.location.href='?isi=pengalaman';
        </script>
        ";		
        
	}
}elseif($aksi=="ubah"){
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ubah Data Pengalaman</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="cust.php">Home</a></li>
              <li class="breadcrumb-item active">Ubah Data Pengalaman</li>
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
                  Ubah Pengalaman
                </h3>
                
              </div><!-- /.card-header -->
              <?php
                $t=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM tb_pengalaman WHERE id_pengalaman='$_GET[id]'"));
              ?>
              <div class="card-body">
                <form action="?isi=pengalaman&aksi=update" method="post" >
                  <input type="hidden" value="<?php echo "$_GET[id]"; ?>" name="id_pengalaman">
                <div class="row">
                  <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <div class="form-group">
                        <label>Tahun Bekerja</label>
                        <input type="text" class="form-control" name="tahun" placeholder="Tahun bekerja " value="<?php echo "$t[tahun]"; ?>">
                      </div>
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <!-- text input -->
                      <div class="form-group">
                        <div class="form-group">
                        <label>Perusahaan/Instansi</label>
                        <input type="text" class="form-control" name="perusahaan" placeholder="Perusahaan/Instansi Bekerja" value="<?php echo "$t[perusahaan]"; ?>">
                      </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <div class="form-group">
                        <label>Pekerjaan/Jabatan</label>
                        <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan" value="<?php echo "$t[pekerjaan]"; ?>">
                      </div>
                      </div>
                    </div>
                    
              </div>
              <button type="submit" class="btn btn-primary">Ubah</button>
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

<?php
}elseif($aksi=="update"){
  if(empty($_POST['tahun']) OR empty($_POST['perusahaan']) OR empty($_POST['pekerjaan'])){
		echo "
        <script>
            alert('Data Belum Lengkap');
            window.location.href='?isi=pengalaman;
        </script>
        ";
	}else{
	mysqli_query($conn,"UPDATE `tb_pengalaman` SET
		`tahun`='$_POST[tahun]', `perusahaan`='$_POST[perusahaan]', `pekerjaan`='$_POST[pekerjaan]' 
    WHERE id_pengalaman='$_POST[id_pengalaman]'");
		echo "
    <script>
    alert('Data Berhasil Diubah');
    window.location.href='?isi=pengalaman';
    </script>";		
        
	}
}elseif($aksi=="hapus"){
  mysqli_query($conn,"DELETE FROM tb_pengalaman WHERE id_pengalaman='$_GET[id]'");
		echo "
        <script>
            alert('Data Berhasil Dihapus');
            window.location.href='?isi=pengalaman';
        </script>
        ";
}else{
$cek1=mysqli_query($conn,"SELECT * FROM tb_pelamar WHERE id_pelamar='$_SESSION[idpel]'");
$c1=mysqli_fetch_array($cek1);
if(empty($c1['nama_pelamar']) OR empty($c1['nomor_hp'])){
    echo "
        <script>
            alert('Data Biodata Anda Belum Lengkap, Silahkan Lengkapi Terlebih Dahulu');
            window.location.href='?isi=biodata';
        </script>
        ";
}else{
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pengalaman Kerja </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="cust.php">Home</a></li>
              <li class="breadcrumb-item active">Data Pengalaman Kerja</li>
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
                <h3 class="card-title">Data Pengalaman Kerja <a href="?isi=tambahpengalaman" class="btn btn-success"><i class="fa fa-plus"></i> Tambah </a> </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Tahun Bekerja</th>
                    <th>Perusahaan</th>
                    <th>Pekerjaan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $qb1=mysqli_query($conn,"SELECT * FROM tb_pengalaman WHERE id_pelamar='$_SESSION[idpel]'");
                    
                      while($b1=mysqli_fetch_array($qb1)){
                        echo "
                        <tr>
                          <td>$b1[tahun]</td>
                          <td>$b1[perusahaan]</td>
                          <td>$b1[pekerjaan]</td>
                          <td>
                          <a href='?isi=pengalaman&aksi=ubah&id=$b1[id_pengalaman]' class='btn btn-primary'><i class='fa fa-edit'></i> Ubah </a> || 
                          <a href='?isi=pengalaman&aksi=hapus&id=$b1[id_pengalaman]' class='btn btn-danger'><i class='fa fa-trash'></i> Hapus</a> ||
                          </td>
                        </tr>
                        ";
                      }

                    ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Tahun Bekerja</th>
                    <th>Perusahaan</th>
                    <th>Pekerjaan</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
</section>
    <!-- /.content -->
  </div>            
  <?php
}
}
  ?>