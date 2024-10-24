<?php
if($_GET['aksi']=="tambah"){
	if(empty($_POST['dokumen'])){
		echo "
        <script>
            alert('Data Belum Lengkap');
            window.location.href='?isi=dokumen;
        </script>
        ";
	}else{
    $id=mysqli_fetch_array(mysqli_query($conn,"SELECT MAX(id_dokumen)+1 no_id, nm_dokumen FROM tb_dokumen"));
    mysqli_query($conn,"INSERT INTO `tb_dokumen` (`nm_dokumen`) VALUES ('$_POST[dokumen]')");
    $nm_folder = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_POST["dokumen"]);
    $ganti_nama=str_replace(" ","_",$nm_folder) ;
    $nama_folder = $id['no_id']."_".$ganti_nama;
    $fd = mkdir ("dokumen/$nama_folder"); 
      if ($fd) { 
        echo "<script>
        alert('Data Berhasil Disimpan');
        window.location.href='?isi=dokumen';
        </script>"; 
      } 
      else { 
        echo "<script>
        alert('Data Tidak Berhasil Disimpan');
        window.location.href='?isi=dokumen';
        </script>"; 
      }

	}
}elseif($_GET['aksi']=="simpan"){
  if($_POST['dokumen']==""){
    echo "
        <script>
            alert('Data Belum Lengkap');
            window.location.href='?isi=dokumen&aksi=ubah&id=$_POST[id]';
        </script>
        ";
	}else{
    $dd=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM tb_dokumen WHERE id_dokumen='$_POST[id]'"));

    $nm_folder = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_POST["dokumen"]);
    $ganti_nama=str_replace(" ","_",$nm_folder) ;
    $nama_folder = $_POST['id']."_".$ganti_nama;
    $fd = rename ("dokumen/$_POST[id]"."_"."$dd[nm_dokumen]","dokumen/$nama_folder"); 
    mysqli_query($conn,"UPDATE `tb_dokumen` SET `nm_dokumen`='$_POST[dokumen]' WHERE id_dokumen='$_POST[id]'");
    
    if ($fd) { 
      echo "<script>
      alert('Data Berhasil Disimpan');
      window.location.href='?isi=dokumen';
      </script>"; 
    } 
    else { 
      echo "<script>
      alert('Data Tidak Berhasil Disimpan');
      window.location.href='?isi=dokumen';
      </script>"; 
    }
	}
}elseif($_GET['aksi']=="ubah"){
  
	$qb1=mysqli_query($conn,"SELECT * FROM tb_dokumen WHERE id_dokumen='$_GET[id]'");
	$b1=mysqli_fetch_array($qb1);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Ubah Data Dokumen</h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="cust.php">Home</a></li>
              <li class="breadcrumb-item active">Ubah Data Dokumen</li>
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
                <h3 class="card-title">Data Dokumen </h3>
              </div>

              <div class="card-body col-lg-12">
                <form action="?isi=datadokumen&aksi=simpan" method="post" >
                  <input type="hidden" name="id" value="<?php echo "$b1[id_dokumen]"; ?>">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Dokumen</label>
                                <input type="text" class="form-control" placeholder="Nama Dokumen" name="dokumen" value="<?php echo "$b1[nm_dokumen]"; ?>" >
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="?isi=dokumen"  class="btn btn-danger">Kembali</a>
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
	mysqli_query($conn,"DELETE FROM tb_dokumen WHERE id_dokumen='$_GET[id]'");
		echo "
        <script>
            alert('Data Berhasil Dihapus');
            window.location.href='?isi=dokumen';
        </script>
        ";
}
?>