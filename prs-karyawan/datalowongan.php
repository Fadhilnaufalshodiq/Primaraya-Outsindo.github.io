<?php
if($_GET['aksi']=="tambah"){
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Data Lowongan Pekerjaan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="pengguna.php">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Lowongan Pekerjaan</li>
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
                <h3 class="card-title">Tambah Data Lowongan Pekerjaan </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <label>Tambah Data Lowongan Pekerjaan</label>
                <form action="?isi=datalowongan&aksi=simpan" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Kualifikasi</label>
                        <textarea class="form-control" name="kualifikasi" ></textarea>
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Benefit</label>
                        <textarea class="form-control" name="benefit" ></textarea>
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Catatan</label>
                        <textarea class="form-control" name="catatan" ></textarea>
                      </div>
                  </div>
                  </div>
                  <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tanggal Tayang</label>
                        <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="tgl_awal_tayang" >
                      </div>
                  </div>
                  <div class="col-sm-2">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Durasi Tayang</label>
                        <input type="number" class="form-control" placeholder="7" name="durasi" > Hari
                      </div>
                  </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label>Jenjang Pendidikan </label>
                          <select class="form-control select2" style="width: 100%;" name="jenjang">
                          <option value="0" selected="selected">PIlih Jenjang</option>
                          <option value="SMA">SMA</option>
                          <option value="D3">Diploma III / IV</option>
                          <option value="S1">Strata Satu</option>
                          <option value="S2">Pasca Sarjana</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label>Dokumen Yang Dibutuhkan </label>
                          <?php
                          $sqlB=mysqli_query($conn,"SELECT * FROM tb_dokumen");
                          while($b1=mysqli_fetch_array($sqlB)){
                              echo " <div class='form-check'>
                              <input class='form-check-input' type='checkbox' id='check1' name='dokumen[]' value='$b1[id_dokumen]' >
                              <label class='form-check-label'>$b1[nm_dokumen]</label>
                            </div> ";
                          }
                          ?>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.card -->
      </div>
    </section>
  </div>
  <?php
}elseif($_GET['aksi']=="simpan"){
	if(empty($_POST['benefit']) OR empty($_POST['kualifikasi']) OR empty($_POST['catatan']) OR empty($_POST['jenjang']) OR empty($_POST['dokumen']) OR empty($_POST['tgl_awal_tayang']) OR empty($_POST['durasi'])){
		echo "
        <script>
            alert('Data Belum Lengkap');
            window.location.href='?isi=pengguna;
        </script>
        ";
	}else{
        $k=$_POST['kualifikasi'];
        $b=$_POST['benefit'];
        $c=$_POST['catatan'];
        $j=$_POST['jenjang'];
        $t=$_POST['tgl_awal_tayang'];
        $d=$_POST['durasi'];
        $dok=implode(",", $_POST['dokumen']);
        
	    mysqli_query($conn,"INSERT INTO `tb_loker` 
		( `id_dokumen`,`benefit`,`kualifikasi`,`catatan`,`jenjang_pendidikan`,tgl_awal_tayang,tgl_akhir_tayang) VALUES 
		('$dok','$b','$k','$c','$j','$t','$t' + INTERVAL $d DAY)");
		echo "
        <script>
            alert('Data Berhasil Disimpan');
            window.location.href='?isi=lowongan';
        </script>
        ";		
    
	}
}elseif($_GET['aksi']=="update"){
  if($_POST['status_lamaran']=="" OR $_POST['catatan']==""){
    echo "
        <script>
            alert('Data Belum Lengkap');
            window.location.href='?isi=datalowongan&aksi=cek=$_POST[id_lamaran]';
        </script>
        ";
	}else{
    $tgl_sekarang=date("Y-m-d");
	mysqli_query($conn,"UPDATE `tb_lamaran` SET 
		`status_lamaran`='$_POST[status_lamaran]',`catatan`='$_POST[catatan]', tgl_ubah_status='$tgl_sekarang'  
    WHERE id_lamaran='$_POST[id_lamaran]'");
		echo "
        <script>
            alert('Data Berhasil Diubah');
            window.location.href='?isi=lowongan';
        </script>
        ";
	}
}elseif($_GET['aksi']=="detail"){
    $qb1=mysqli_query($conn,"SELECT * FROM tb_loker WHERE id_loker='$_GET[id]'");
	  $b1=mysqli_fetch_array($qb1);

  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tampil Data Lowongan Pekerjaan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="pengguna.php">Home</a></li>
              <li class="breadcrumb-item active">Tampil Data Lowongan Pekerjaan</li>
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
                          <h3 class="card-title">Tampil Data Lowongan Pekerjaan </h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <form action="?isi=datalowongan&aksi=simpan" method="post" enctype="multipart/form-data">
                                  <div class="row">
                                      <div class="col-sm-12">
                                          <!-- text input -->
                                          <div class="form-group">
                                          <label>Kualifikasi</label>
                                          <textarea class="form-control" name="kualifikasi" readonly><?php echo "$b1[kualifikasi]"; ?></textarea>
                                          </div>
                                      </div>
                                      <div class="col-sm-12">
                                          <!-- text input -->
                                          <div class="form-group">
                                          <label>Benefit</label>
                                          <textarea class="form-control" name="benefit" readonly ><?php echo "$b1[benefit]"; ?></textarea>
                                          </div>
                                      </div>
                                      <div class="col-sm-12">
                                          <!-- text input -->
                                          <div class="form-group">
                                          <label>Catatan</label>
                                          <textarea class="form-control" name="catatan" readonly><?php echo "$b1[catatan]"; ?></textarea>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                          <div class="col-sm-2">
                                              <!-- text input -->
                                              <div class="form-group">
                                              <label>Tanggal Tayang</label>
                                              <input type="text" class="form-control" name="tgl_awal_tayang" value="<?php echo "$b1[tgl_awal_tayang]"; ?>" readonly>
                                              </div>
                                          </div>
                                          <div class="col-sm-2">
                                              <!-- text input -->
                                              <div class="form-group">
                                              <label>Tanggal Berkahir</label>
                                              <input type="text" class="form-control" name="durasi" value="<?php echo "$b1[tgl_akhir_tayang]"; ?>" readonly >
                                              </div>
                                          </div>
                                          <div class="col-sm-2">
                                              <!-- text input -->
                                              <div class="form-group">
                                              <label>Jenjang Pendidikan </label>
                                              <input type="text" class="form-control" name="jenjang" value="<?php echo "$b1[jenjang_pendidikan]"; ?>" readonly >
                                              </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <!-- text input -->
                                              <div class="form-group">
                                              <label>Dokumen </label>
                                              <input type="text" class="form-control" name="jenjang" value="<?php 
                                              $tags = $b1['id_dokumen'];

                                              $tag = explode(",", $tags);
                                              foreach($tag as $t):
                                                  $bb=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_dokumen WHERE id_dokumen='$t'"));
                                                  echo "$t. $bb[nm_dokumen]   ";
                                              endforeach;
                                              ?>" readonly >
                                              </div>
                                          </div>
                                  </div>         
                              </form>
                              <?php
                              $SQLLoker=mysqli_query($conn, "SELECT l.*, p.nama_pelamar FROM tb_lamaran l, tb_pelamar p 
                              WHERE id_loker='$_GET[id]' AND l.id_pelamar=p.id_pelamar");
                              ?>
                              <div class="card-body">
                                  <table id="example1" class="table table-bordered table-striped">
                                      <thead>
                                      <tr>
                                          <th>No.</th>
                                          <th>Nama Pelamar</th>
                                          <th>Dokumen</th>
                                          <th>Status Lamaran</th>
                                          <th>Tanggal Melamar</th>
                                          <th>Aksi</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                          <?php
                                          $no=1;
                                          while($l1=mysqli_fetch_array($SQLLoker)){
                                              $tags1 = $l1['id_dokumen'];
                                              $tag1 = explode(",", $tags1);
                                              if($b1['id_dokumen']==$l1['id_dokumen']){
                                                  $stt="Sudah Lengkap";
                                              }else{
                                                  $stt="Belum Lengkap";
                                              }

                                              if($l1['status_lamaran']==0){
                                                $stl="Belum Diperiksa";
                                                $button="<a href='?isi=datalowongan&aksi=cek&id=$l1[id_lamaran]&idp=$l1[id_pelamar]' class='btn btn-primary'><i class='fa fa-eye'></i> Cek</a>";
                                              }elseif($l1['status_lamaran']==1){
                                                $stl="Proses Interview";
                                                $button="<a href='?isi=datalowongan&aksi=cek&id=$l1[id_lamaran]&idp=$l1[id_pelamar]' class='btn btn-primary'><i class='fa fa-eye'></i> Cek</a>";
                                              }elseif($l1['status_lamaran']==2){
                                                $stl="Cetak PKWT";
                                                $button="
                                                <form name='upload_pkwt' action='?isi=datalowongan&aksi=uploadpkwt' method='post' enctype='multipart/form-data'>
                                                  <input type='file' name='pkwt' >
                                                  <input type='hidden' name='id_lamaran' value='$l1[id_lamaran]'><br>
                                                  <input type='hidden' name='id_pelamar' value='$l1[id_pelamar]'><br>
                                                  <input type='hidden' name='id_loker' value='$l1[id_loker]'><br>
                                                  <p style='color: red'>Ekstensi yang diperbolehkan .pdf dan Maksimal 5MB</p><br>
                                                  <input type='submit' name='submit' value='Upload'>
                                                </form>
                                                ";
                                              }else{
                                                $stl="Ditolak";
                                              }

                                              echo "
                                              <tr>
                                                  <td>$no</td>
                                                  <td>$l1[nama_pelamar]</td>
                                                  <td>$stt<br>";

                                                  foreach($tag1 as $t1):
                                                      $bb1=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_dokumen WHERE id_dokumen='$t1'"));
                                                  echo "$t1. $bb1[nm_dokumen]   ";
                                                  endforeach;
                                                  echo " </td>
                                                  <td>$stl</td>
                                                  <td>$l1[tgl_melamar]</td>
                                                  <td>$button</td>
                                              </tr>";
                                              $no++;
                                          }

                                          ?>
                                      </tbody>
                                      <tfoot>
                                          <tr>
                                              <th>No.</th>
                                              <th>Nama Pelamar</th>
                                              <th>Dokumen</th>
                                              <th>Status Lamaran</th>
                                              <th>Tanggal Melamar</th>
                                              <th>Aksi</th>
                                          </tr>
                                      </tfoot>
                                  </table>
                              </div>  
                          </div>
                          <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  </div>
                  <!-- /.card -->
              </div>
      </section>
  </div>
  <?php
}elseif($_GET['aksi']=="cek"){
  $qb1=mysqli_query($conn,"SELECT * FROM tb_lamaran l, tb_pelamar p WHERE l.id_pelamar=p.id_pelamar 
  AND id_lamaran='$_GET[id]' AND p.id_pelamar='$_GET[idp]' ");
  $b1=mysqli_fetch_array($qb1);
  if($b1['status_lamaran']==0){
    $stl="Belum Diperiksa";
  }elseif($b1['status_lamaran']==1){
    $stl="Proses Interview";
  }elseif($b1['status_lamaran']==2){
    $stl="Cetak PKWT";
  }elseif($b1['status_lamaran']==3){
    $stl="Revisi Dokumen";
  }else{
    $stl="Ditolak";
  }    

  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cek Lowongan Pekerjaan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="pengguna.php">Home</a></li>
              <li class="breadcrumb-item active">Cek Lowongan Pekerjaan</li>
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
                          <h3 class="card-title">Cek Lowongan Pekerjaan </h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              
                                  <div class="row">
                                      <div class="col-sm-6">
                                          <!-- text input -->
                                          <div class="form-group">
                                          <label>Nama Pelamar</label>
                                          <input type="text" class="form-control" name="nama_pelamar" value="<?php echo "$b1[nama_pelamar]"; ?>" readonly>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <!-- text input -->
                                          <div class="form-group">
                                          <label>Nama Panggilan</label>
                                          <input type="text" class="form-control" name="nama_panggilan" value="<?php echo "$b1[nama_panggilan]"; ?>" readonly>
                                          </div>
                                      </div>
                                      <div class="col-sm-12">
                                          <!-- text input -->
                                          <div class="form-group">
                                          <label>Alamat</label>
                                          <textarea class="form-control" name="alamat" readonly><?php echo "$b1[alamat]"; ?></textarea>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                          <div class="col-sm-2">
                                              <!-- text input -->
                                              <div class="form-group">
                                              <label>Nomor Telepon</label>
                                              <input type="text" class="form-control" name="nomor_hp" value="<?php echo "$b1[nomor_hp]"; ?>" readonly>
                                              </div>
                                          </div>
                                          <div class="col-sm-2">
                                              <!-- text input -->
                                              <div class="form-group">
                                              <label>NIK</label>
                                              <input type="text" class="form-control" name="no_ktp" value="<?php echo "$b1[no_ktp]"; ?>" readonly >
                                              </div>
                                          </div>
                                          <div class="col-sm-4">
                                              <!-- text input -->
                                              <div class="form-group">
                                              <label>E-Mail </label>
                                              <input type="text" class="form-control" name="jenjang" value="<?php echo "$b1[email]"; ?>" readonly >
                                              </div>
                                          </div>
                                          <div class="col-sm-4">
                                              <!-- text input -->
                                              <div class="form-group">
                                              <label>Status Lamaran </label>
                                              <input type="text" class="form-control" name="jenjang" value="<?php echo "$stl"; ?>" readonly >
                                              </div>
                                          </div>
                                  </div>         
                              <?php
                              $SQLLoker=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_loker WHERE id_loker='$b1[id_loker]'"));
                              ?>
                              <div class="card-body">
                                  <table id="example1" class="table table-bordered table-striped">
                                      <thead>
                                      <tr>
                                          <th>No.</th>
                                          <th>Nama Dokumen</th>
                                          <th>Dokumen Upload</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                          <?php
                                              $no=1;
                                              $tagsL = $SQLLoker['id_dokumen'];
                                              $tagL = explode(",", $tagsL);
                                              $id_k= explode(",", $b1['id_dokumen']);
                                                  foreach($tagL as $tL1):
                                                      $bb1=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_dokumen WHERE id_dokumen='$tL1'"));
                                                      $doku="$b1[id_pelamar] $b1[id_loker] $bb1[nm_dokumen]";
                                                      $int1=$tL1-1;
                                                      if(isset($id_k[$int1])){
                                                        $bd1=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_dokumen WHERE id_dokumen='$id_k[$int1]'"));  
                                                        $nama_d=str_replace(" ","_",$bd1['nm_dokumen']);
                                                        $cek="<a href='dokumen/$bd1[id_dokumen]_$nama_d/$b1[id_pelamar]_$b1[id_loker]_$nama_d.pdf' >Download</a>";
                                                      }else{
                                                        $cek="Tidak Ada Dokumen";
                                                      }
                                                      
                                                  echo "
                                                  <tr>
                                                    <td>$no</td>
                                                    <td>$bb1[nm_dokumen]</td>
                                                    <td>$cek</td>
                                                    ";
                                                    
                                                  $no++;
                                                  endforeach;
                                          ?>
                                      </tbody>
                                      <tfoot>
                                      <tr>
                                          <th>No.</th>
                                          <th>Nama Dokumen</th>
                                          <th>Dokumen Upload</th>
                                      </tr>
                                      </tfoot>
                                  </table>
                              </div>  
                              <form action="?isi=datalowongan&aksi=update" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="id_lamaran" value="<?php echo "$b1[id_lamaran]"; ?>">
                              <div class="row">
                                      <div class="col-sm-6">
                                          <!-- text input -->
                                          <div class="form-group">
                                            <?php
                                              if($b1['status_lamaran']==0){
                                                $option="
                                                <option value=1>Proses Interview</option>
                                                <option value=2>Diterima</option>
                                                <option value=3>Ditolak</option>
                                                ";
                                              }elseif($b1['status_lamaran']==1){
                                                $option="<option value=2>Diterima</option>
                                                <option value=3>Ditolak</option>
                                                ";
                                              }else{
                                                $option="<option value=3>Ditolak</option>";
                                              }  
                                            ?>
                                            <label>Status Lamaran </label>
                                            <select class="form-control select2" style="width: 100%;" name="status_lamaran">
                                            <option value="" selected="selected">PIlih Hak Akses</option>
                                            <?php
                                            echo "$option";
                                            ?></select>
                                          </div>
                                      </div>
                                      <div class="col-sm-12">
                                          <!-- text input -->
                                          <div class="form-group">
                                          <label>Catatan</label>
                                          <textarea class="form-control" name="catatan" ><?php echo "$b1[catatan]"; ?></textarea>
                                          </div>
                                      </div>
                                      <button type="submit" class="btn btn-primary">Simpan</button>
                                  </div>
                              </form>
                          </div>
                          <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  </div>
                  <!-- /.card -->
              </div>
      </section>
  </div>
  <?php
}elseif($_GET['aksi']=="uploadpkwt"){
  $rand = rand();
  $file_type=$_FILES['pkwt']['type'];
  $filename = $_FILES['pkwt']['name'];
  $ukuran = $_FILES['pkwt']['size'];
  $nama_file = "PKWT";
  $ext = pathinfo($filename, PATHINFO_EXTENSION);
  
  if($file_type!="application/pdf") {
    echo "
        <script>
            alert('Tipe File Harus PDF');
            window.location.href='?isi=datalowongan&aksi=detail&id=$_POST[id_lamaran]';
        </script>
        ";
  }else{
    if($ukuran < 5044070){		
      $xx = $_POST['id_pelamar']."_".$_POST['id_loker']."_".$nama_file.".".$ext;
      move_uploaded_file($_FILES['pkwt']['tmp_name'], 'dokumen/upload_pkwt/'.$xx);
      $ubah=mysqli_query($conn, "UPDATE tb_lamaran SET pkwt='$xx' WHERE id_lamaran='$_POST[id_lamaran]'");
      if($ubah){
        echo "
        <script>
            alert('Berhasil Upload PKWT');
            window.location.href='?isi=lowongan';
        </script>";
      }else{
        echo "
        <script>
            alert('Tidak Berhasil Upload PKWT');
            window.location.href='?isi=datalowongan&aksi=detail&id=$_POST[id_lamaran]';
        </script>";
      }
    }else{
      header("location:index.php?alert=gagak_ukuran");
    }
  }
}else{
	mysqli_query($conn,"DELETE FROM tb_admin WHERE id_sadsadmin='$_GET[id]'");
		echo "
        <script>
            alert('Data Berhasil Dihapus');
            window.location.href='?isi=pengguna';
        </script>
        ";
}
?>