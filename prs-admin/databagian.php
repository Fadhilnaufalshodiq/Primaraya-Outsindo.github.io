<?php
if($_GET['aksi']=="tambah"){
	if(empty($_POST['bagian'])){
		echo "
        <script>
            alert('Data Belum Lengkap');
            window.location.href='?isi=bagian;
        </script>
        ";
	}else{
    mysqli_query($conn,"INSERT INTO `tb_bagian` (`nm_bagian`) VALUES ('$_POST[bagian]')");
    echo "
        <script>
            alert('Data Berhasil Disimpan');
            window.location.href='?isi=bagian';
        </script>
        ";		
    
	}
}elseif($_GET['aksi']=="simpan"){
  if($_POST['bagian']==""){
    echo "
        <script>
            alert('Data Belum Lengkap');
            window.location.href='?isi=bagian&aksi=ubah&id=$_POST[id]';
        </script>
        ";
	}else{
	mysqli_query($conn,"UPDATE `tb_bagian` SET `nm_bagian`='$_POST[bagian]' WHERE id_bagian='$_POST[id]'");
		echo "
        <script>
            alert('Data Berhasil Diubah');
            window.location.href='?isi=bagian';
        </script>
        ";
	}
}elseif($_GET['aksi']=="ubah"){
  
	$qb1=mysqli_query($conn,"SELECT * FROM tb_bagian WHERE id_bagian='$_GET[id]'");
	$b1=mysqli_fetch_array($qb1);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Ubah Data Bagian</h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="cust.php">Home</a></li>
              <li class="breadcrumb-item active">Ubah Data Bagian</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid col-sm-12">
        <div class="row">
          <!-- Left col -->
          <section class="content">
           <div class="container-fluid">
  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Bagian </h3>
              </div>

              <div class="card-body col-lg-12">
                <form action="?isi=databagian&aksi=simpan" method="post" >
                  <input type="hidden" name="id" value="<?php echo "$b1[id_bagian]"; ?>">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Bagian</label>
                                <input type="text" class="form-control" placeholder="Nama Bagian" name="bagian" value="<?php echo "$b1[nm_bagian]"; ?>" >
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="?isi=bagian"  class="btn btn-danger">Kembali</a>
                    <!-- /.card-body -->    
                </form>
              </div>

            </div>
              <!-- /.card -->
           </div>  
                <!-- /.container-fluid -->
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
	mysqli_query($conn,"DELETE FROM tb_bagian WHERE id_bagian='$_GET[id]'");
		echo "
        <script>
            alert('Data Berhasil Dihapus');
            window.location.href='?isi=bagian';
        </script>
        ";
}
?>