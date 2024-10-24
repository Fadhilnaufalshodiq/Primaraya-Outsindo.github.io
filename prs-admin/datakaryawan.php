<?php
if($_GET['aksi']=="tambah"){
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Data Karyawan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="karyawan.php">Home</a></li>
            <li class="breadcrumb-item active">Tambah Data Karyawan</li>
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
              <h3 class="card-title">Tambah Data Karyawan </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <label>Tambah Data Karyawan</label>
              <form action="?isi=datakaryawan&aksi=simpan" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                      <label>NRK</label>
                      <input type="text" class="form-control" placeholder="NRK" name="nrk" >
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Nama Karyawan</label>
                      <input type="text" class="form-control" placeholder="Nama Karyawan" name="nama" >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" class="form-control" placeholder="Tempat Lahir" name="t_lhr" >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="tgl_lhr" >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                    <label>Jabatan </label>
                        <select class="form-control select2" style="width: 100%;" name="akses">
                        <option value="0" selected="selected">PIlih Hak Akses</option>
                        <option value="1">Staff</option>
                        <option value="2">Supervisor</option>
                        <option value="3">Manager</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                    <label>Bagian </label>
                        <?php
                        $sqlB=mysqli_query($conn,"SELECT * FROM tb_bagian");
                        ?>
                        <select class="form-control select2" style="width: 100%;" name="bagian">
                        <option value="0" selected="selected">PIlih Bagian</option>
                        <?php
                        while($b1=mysqli_fetch_array($sqlB)){
                            echo "<option value=$b1[id_bagian]>$b1[nm_bagian]</option>";
                        }
                        ?>
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>NPWP</label>
                      <input type="text" class="form-control" placeholder="Masukan NPWP" name="npwp" >
                    </div>
                  </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
              <!-- /.card-body -->
              </form>
              </div>
            <!-- /.card-body -->
          </div>
        </div>
</div>
</section>
<?php
}elseif($_GET['aksi']=="simpan"){
	if(empty($_POST['nrk']) 
  OR empty($_POST['nama']) 
  OR empty($_POST['t_lhr']) 
  OR empty($_POST['tgl_lhr']) 
  OR empty($_POST['akses']) 
  OR empty($_POST['bagian']) 
  OR empty($_POST['npwp'])){
		echo "
        <script>
            alert('Data Belum Lengkap');
            window.location.href='?isi=datakaryawan&aksi=tambah';
        </script>
        ";
	}else{
    $tgl_sekarang=date("Y-m-d");
	  $sql=mysqli_query($conn,"INSERT INTO `tb_karyawan` 
		( `nrk`,`nama`,`tempat_lhr`, tgl_lahir, jabatan,tgl_masuk,kata_kunci,`status` ) VALUES 
		('$_POST[nrk]','$_POST[nama]','$_POST[t_lhr]','$_POST[tgl_lhr]','$_POST[akses]$_POST[bagian]','$tgl_sekarang',md5('$_POST[password]'),'1')");
		if($sql){
      echo "
        <script>
          alert('Data Berhasil Disimpan');
          window.location.href='?isi=karyawan';
        </script>
        ";		
    }else{
      echo "
      
        <script>
            alert('Data Gagal Disimpan');
            window.location.href='?isi=karyawan';
        </script>
        ";		
    }

	}
}elseif($_GET['aksi']=="update"){
  if($_POST['username']=="" OR $_POST['akses']=="" OR $_POST['status']==""){
    echo "
        <script>
            alert('Data Belum Lengkap');
            window.location.href='?isi=karyawan&aksi=ubahid=$_POST[id]';
        </script>
        ";
	}else{
	mysqli_query($conn,"UPDATE `tb_admin` SET 
		`username`='$_POST[username]',`akses`='$_POST[akses]',`status`='$_POST[status]' WHERE id_admin='$_POST[id]'");
		echo "
        <script>
            alert('Data Berhasil Diubah');
            window.location.href='?isi=karyawan';
        </script>
        ";
	}
}elseif($_GET['aksi']=="ubah"){
  
	$qb1=mysqli_query($conn,"SELECT k.*, b.`nm_bagian`, CONCAT(IF(LEFT(jabatan,1)=1,'Staff ',IF(LEFT(jabatan,1)=1,'Supervisor ','Manager ')),nm_bagian) jbtn 
  FROM tb_karyawan k, tb_bagian b WHERE id_karyawan='$_GET[id]' AND RIGHT(jabatan,1)=b.`id_bagian`");
	$Q1=mysqli_fetch_array($qb1);
  $tgl_indo1=tgl_indo($Q1['tgl_lahir']);
  $tgl_indo2=tgl_indo($Q1['tgl_masuk']);

  if ($Q1['status']==0){
    $status="Non Aktif";
  }else{
    $status="Aktif";
  }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ubah Data Karyawan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="cust.php">Home</a></li>
              <li class="breadcrumb-item active">Ubah Data Karyawan</li>
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
          <section class="content">
      <div class="container-fluid">
  
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Karyawan </h3>
              </div>
              <div class="card-body">
                <form action="?isi=datakaryawan&aksi=update" method="post" enctype="multipart/form-data">
<input type="hidden" name="idk" value="<?php echo "$Q1[id_karyawan]"; ?>" >
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>NRK</label>
            <input type="text" class="form-control" placeholder="Masukan NRK" name="nama" value="<?php echo "$Q1[NRK]"; ?>" >
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Nama Karyawan</label>
            <input type="text" class="form-control" placeholder="Masukan Nama Karyawan" name="nama" value="<?php echo "$Q1[nama]"; ?>" >
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" class="form-control" placeholder="Masukan Tempat Lahir" name="tempat_lhr" value="<?php echo "$Q1[tempat_lhr]"; ?>" >
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="text" class="form-control" placeholder="Masukan Tanggal Lahir" name="tgl_lahir" value="<?php echo "$Q1[tgl_lahir]"; ?>" >
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Jabatan</label>
            <input type="text" class="form-control" placeholder="Masukan Jabatan" name="nama" value="<?php echo "$Q1[jbtn]"; ?>" >
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Tanggal Masuk</label>
            <input type="text" class="form-control" placeholder="Masukan Tanggal Masuk" name="tgl_masuk" value="<?php echo "$Q1[tgl_masuk]"; ?>" >
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>NPWP</label>
            <input type="text" class="form-control" placeholder="Masukan NPWP" name="tempat_lhr" value="<?php echo "$Q1[npwp]"; ?>" >
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Ubah Data</button>
    </div>
</div>  
  
</form>

              </div>
              <!-- /.card-header -->
              <!-- /.card-body -->
            </div>
          </div>
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
}elseif($_GET['aksi']=="uploadpaklaring"){
  $rand = rand();
  $file_type=$_FILES['paklaring']['type'];
  $filename = $_FILES['paklaring']['name'];
  $ukuran = $_FILES['paklaring']['size'];
  $nama_file = "Paklaring";
  $ext = pathinfo($filename, PATHINFO_EXTENSION);

  
  
  if($file_type!="application/pdf") {
    echo "
        <script>
            alert('Tipe File Harus PDF');
            window.location.href='?isi=karyawan';
        </script>
        ";
  }else{
    if($ukuran < 5044070){	
      $xx = $rand."_".$_POST['id']."_".$nama_file.".".$ext;
      move_uploaded_file($_FILES['paklaring']['tmp_name'], 'dokumen/upload_paklaring/'.$xx);
      $ubah=mysqli_query($conn, "UPDATE tb_karyawan SET file_paklaring='$xx', paklaring='1' WHERE id_karyawan='$_POST[id]'");
      if($ubah){
        echo "
        <script>
            alert('Berhasil Upload Paklaring');
            window.location.href='?isi=karyawan';
        </script>";
      }else{
        echo "
        <script>
            alert('Tidak Berhasil Upload Paklaring');
            window.location.href='?isi=karyawan';
        </script>";
      }
    }else{
      header("location:index.php?alert=gagal_ukuran");
    }
  }
}else{
	mysqli_query($conn,"DELETE FROM tb_karyawan WHERE id_karyawan='$_GET[id]'");
		echo "
        <script>
            alert('Data Berhasil Dihapus');
            window.location.href='?isi=karyawan';
        </script>
        ";
}
?>