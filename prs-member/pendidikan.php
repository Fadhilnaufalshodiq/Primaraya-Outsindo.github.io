<?php
if(isset($_GET['aksi'])){
  $aksi="$_GET[aksi]";
}else{
  $aksi="";
}

if($aksi=="tambah"){
  if(empty($_POST['jenjang']) OR empty($_POST['nama_sekolah']) OR empty($_POST['kota']) OR empty($_POST['program_studi']) OR empty($_POST['nem_ipk']) OR empty($_POST['tahun'])){
		echo "
        <script>
            alert('Data Belum Lengkap');
            window.location.href='?isi=pendidikan;
        </script>
        ";
	}else{
	mysqli_query($conn,"INSERT INTO `tb_pendidikan` 
		(id_pelamar,`jenjang`,`nama_sekolah`,`kota`,`program_studi`,nem_ipk,tahun) VALUES 
		('$_SESSION[idpel]','$_POST[jenjang]','$_POST[nama_sekolah]','$_POST[kota]','$_POST[program_studi]','$_POST[nem_ipk]','$_POST[tahun]')");
		echo "
        <script>
            alert('Data Berhasil Disimpan');
            window.location.href='?isi=pendidikan';
        </script>
        ";		
        
	}
}elseif($aksi=="update"){
  if(empty($_POST['jenjang']) OR empty($_POST['nama_sekolah']) OR empty($_POST['kota']) OR empty($_POST['program_studi']) OR empty($_POST['nem_ipk']) OR empty($_POST['tahun'])){
		echo "
        <script>
            alert('Data Belum Lengkap');
            window.location.href='?isi=pendidikan;
        </script>
        ";
	}else{
	mysqli_query($conn,"UPDATE `tb_pendidikan` SET
		`jenjang`='$_POST[jenjang]', `nama_sekolah`='$_POST[nama_sekolah]', `kota`='$_POST[kota]',
    `program_studi`='$_POST[program_studi]',nem_ipk'$_POST[nem_ipk]',tahun='$_POST[tahun]' 
    WHERE id_pendidikan='$_POST[id_pendidikan]'");
		echo "
    <script>
    alert('Data Berhasil Diubah');
    window.location.href='?isi=pendidikan';
    </script>";		
        
	}
}elseif($aksi=="hapus"){
  mysqli_query($conn,"DELETE FROM tb_pendidikan WHERE id_pendidikan='$_GET[id]'");
		echo "
        <script>
            alert('Data Berhasil Dihapus');
            window.location.href='?isi=pendidikan';
        </script>
        ";
}elseif($aksi=="ubah"){
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ubah Data Pendidikan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="cust.php">Home</a></li>
              <li class="breadcrumb-item active">Ubah Data Pendidikan</li>
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
                  Ubah Pendidikan
                </h3>
                
              </div><!-- /.card-header -->
              <?php
                $t=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM tb_pendidikan WHERE id_pendidikan='$_GET[id]'"));
              ?>
              <div class="card-body">
                <form action="?isi=pendidikan&aksi=update" method="post" >
                  <input type="hidden" value="<?php echo "$_GET[id]"; ?>" name="id_pendidikan">
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
                        <input type="text" class="form-control" name="nama_sekolah" placeholder="Nama Sekolah " value="<?php echo "$t[nama_sekolah]"; ?>">
                      </div>
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <!-- text input -->
                      <div class="form-group">
                        <div class="form-group">
                        <label>Kota</label>
                        <input type="text" class="form-control" name="kota" placeholder="Kota" value="<?php echo "$t[kota]"; ?>">
                      </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <div class="form-group">
                        <label>Program Studi</label>
                        <input type="text" class="form-control" name="program_studi" placeholder="Program Studi" value="<?php echo "$t[program_studi]"; ?>">
                      </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <div class="form-group">
                        <label>NEM/IPK</label>
                        <input type="number" class="form-control" name="nem_ipk" placeholder="4,00"value="<?php echo "$t[nem_ipk]"; ?>">
                      </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <div class="form-group">
                        <label>Tahun Lulus</label>
                        <input type="number" class="form-control" name="tahun" placeholder="1999" value="<?php echo "$t[tahun]"; ?>">
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
              <h1 class="m-0">Data Pendidikan </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="cust.php">Home</a></li>
                <li class="breadcrumb-item active">Data Pendidikan</li>
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
                  <h3 class="card-title">Data Pendidikan <a href="?isi=tambahpendidikan" class="btn btn-success"><i class="fa fa-plus"></i> Tambah </a> </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Jenjang Pendidikan</th>
                      <th>Nama Sekolah</th>
                      <th>Kota</th>
                      <th>Program Studi</th>
                      <th>NEM/IPK</th>
                      <th>Tahun Ijazah</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        $qb1=mysqli_query($conn,"SELECT * FROM tb_pendidikan WHERE id_pelamar='$_SESSION[idpel]'");
                        while($b1=mysqli_fetch_array($qb1)){
                          echo "
                          
                          <tr>
                            <td>$b1[jenjang]</td>
                            <td>$b1[nama_sekolah]</td>
                            <td>$b1[kota]</td>
                            <td>$b1[program_studi]</td>
                            <td>$b1[nem_ipk]</td>
                            <td>$b1[tahun]</td>
                            <td>
                            <a href='?isi=pendidikan&aksi=ubah&id=$b1[id_pendidikan]' class='btn btn-primary'><i class='fa fa-edit'></i> Ubah </a> || 
                            <a href='?isi=pendidikan&aksi=hapus&id=$b1[id_pendidikan]' class='btn btn-danger'><i class='fa fa-trash'></i> Hapus</a> ||
                            </td>
                          </tr>
                          ";
                        }

                      ?>
                    
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Jenjang Pendidikan</th>
                      <th>Nama Sekolah</th>
                      <th>Kota</th>
                      <th>Program Studi</th>
                      <th>NEM/IPK</th>
                      <th>Tahun Ijazah</th>
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