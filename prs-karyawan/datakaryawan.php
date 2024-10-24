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
            <li class="breadcrumb-item"><a href="pengguna.php">Home</a></li>
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
              <form action="?isi=datakaryawan&aksi=tambah" method="post" enctype="multipart/form-data">
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
	if(empty($_POST['username']) OR empty($_POST['akses']) OR empty($_POST['password'])){
		echo "
        <script>
            alert('Data Belum Lengkap');
            window.location.href='?isi=pengguna;
        </script>
        ";
	}else{
	mysqli_query($conn,"INSERT INTO `tb_admin` 
		( `username`,`password`,`akses`,`status` ) VALUES 
		('$_POST[username]',md5('$_POST[password]'),'$_POST[akses]','1')");
		echo "
        <script>
            alert('Data Berhasil Disimpan');
            window.location.href='?isi=pengguna';
        </script>
        ";		
        
	}
}elseif($_GET['aksi']=="update"){
  if($_POST['username']=="" OR $_POST['akses']=="" OR $_POST['status']==""){
    echo "
        <script>
            alert('Data Belum Lengkap');
            window.location.href='?isi=pengguna&aksi=ubahid=$_POST[id]';
        </script>
        ";
	}else{
	mysqli_query($conn,"UPDATE `tb_admin` SET 
		`username`='$_POST[username]',`akses`='$_POST[akses]',`status`='$_POST[status]' WHERE id_admin='$_POST[id]'");
		echo "
        <script>
            alert('Data Berhasil Diubah');
            window.location.href='?isi=pengguna';
        </script>
        ";
	}
}elseif($_GET['aksi']=="ubah"){
  
	$qb1=mysqli_query($conn,"SELECT * FROM tb_admin WHERE id_admin='$_GET[id]'");
	$b1=mysqli_fetch_array($qb1);
  if ($b1['status']==0){
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
            <h1 class="m-0">Ubah Data Pengguna</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="cust.php">Home</a></li>
              <li class="breadcrumb-item active">Ubah Data Pengguna</li>
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
                <h3 class="card-title">Data Pengguna </h3>
              </div>
              <div class="card-body">
                <form action="?isi=dataadmin&aksi=update" method="post" >
                  <input type="hidden" name="id" value="<?php echo "$b1[id_admin]"; ?>">
                <div class="row">
                  <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo "$b1[username]"; ?>" >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Akses</label>
                        <select name="akses" class="form-control select2" style="width: 100%;" >
                    <option selected="selected">Piih Hak Akses</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                  </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control select2" style="width: 100%;" >
                    <option selected="selected">Piih Status</option>
                    <option value="0">Non Aktif</option>
                    <option value="1">Aktif</option>
                  </select>
                      </div>
                    </div>
              </div>
              <button type="submit" class="btn btn-primary">Ubah</button>
              <a href="?isi=pengguna"  class="btn btn-danger">Kembali</a>
                <!-- /.card-body -->
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
}else{
	mysqli_query($conn,"DELETE FROM tb_admin WHERE id_admin='$_GET[id]'");
		echo "
        <script>
            alert('Data Berhasil Dihapus');
            window.location.href='?isi=pengguna';
        </script>
        ";
}
?>