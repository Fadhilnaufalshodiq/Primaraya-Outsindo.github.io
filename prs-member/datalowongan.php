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
}elseif($_GET['aksi']=="lamar"){
	if(isset($_FILES['dokumen'])){
    foreach($_FILES['dokumen']['tmp_name'] as $key => $tmp_name)
    {
        $file_name = $_FILES['dokumen']['name'][$key];
        $file_size =$_FILES['dokumen']['size'][$key];
        $file_tmp =$_FILES['dokumen']['tmp_name'][$key];
        $file_type=$_FILES['dokumen']['type'][$key]; 
        if($file_type!="application/pdf") {
          echo "
        <script>
            alert('Tipe File Harus PDF');
            window.location.href='?isi=datalowongan&aksi=detail&id=$_POST[id_loker]';
        </script>
        ";
        }else{
          $id_d=$_POST['id_dokumen'][$key];
          $ff=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM tb_dokumen WHERE id_dokumen='$id_d'"));
          $nama_d=str_replace(" ","_",$ff['nm_dokumen']);
          $folder="../prs-admin/dokumen/$ff[id_dokumen]"."_"."$nama_d";
          $nama_file="$_SESSION[idpel]"."_"."$_POST[id_loker]"."_"."$nama_d.pdf";
          move_uploaded_file($file_tmp,"$folder/$nama_file");
          $id_dokk=implode(',',$_POST['id_dokumen']);
          
        }
    }
    $tgl_sekarang=date("Y-m-d");
    mysqli_query($conn,"INSERT INTO tb_lamaran (id_pelamar, id_loker, id_dokumen, status_lamaran, tgl_melamar) VALUE 
    ('$_SESSION[idpel]','$_POST[id_loker]','$id_dokk','0','$tgl_sekarang')");
    echo "
    <script>
        alert('Lamaran Anda Berhasil Tersimpan, Tunggu Status Informasi Selanjutnya');
        window.location.href='?isi=lowongan';
    </script>
    ";
  }else{
    echo "<form enctype='multipart/form-data' action='test1.php' method='POST'>";
     echo "File:<input name='dokumen[]' multiple='multiple' type='file'/><input type='submit' value='Upload'/>";
    
     echo "</form>";
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
                                              <label>Tanggal Berakhir</label>
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
                                          
                                  </div>         
                              </form>
                              <div class="card-body">
                                  
                                        <form name="upload_lamaran" method="post" action="?isi=datalowongan&aksi=lamar" enctype="multipart/form-data">
                                          <?php
                                          echo "<input type='hidden' name='id_loker' value='$b1[id_loker]'>";
                                          $no=1;
                                            $tags1 = $b1['id_dokumen'];
                                            $tag1 = explode(",", $tags1);
                                            foreach($tag1 as $t1):
                                                $bb1=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_dokumen WHERE id_dokumen='$t1'"));
                                            ?>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label><?php echo "$bb1[nm_dokumen]"; ?></label>
                                                        <input type="file" name="dokumen[]" id="fileToUpload" multiple>
                                                        <input type="hidden" name="id_dokumen[]" value="<?php echo "$bb1[id_dokumen]" ?>">
                                                    </div>
                                                </div>
                                             
                                            <?php
                                            $no++;
                                            endforeach;
                                            ?>
                                            <p style="color: red">Ekstensi yang diperbolehkan .pdf dan Maksimal 5MB</p>
                                            
                                        <input type="submit" name="submit" value="Simpan" >
                                    </form>
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
                              <form action="?isi=datalowongan&aksi=simpan" method="post" enctype="multipart/form-data">
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
                              </form>
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
                                                        $cek="<a href='dokumen/$bd1[id_dokumen] $bd1[nm_dokumen]/$b1[id_pelamar] $b1[id_loker] $bd1[nm_dokumen].pdf' >Download</a>";
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
                                                  /*
                                                  $tagsb1 = $b1['id_dokumen'];
                                                  $tagLb1 = explode(",", $tagsb1);

                                                  foreach($tagLb1 as $tLB1):
                                                  echo "
                                                  
                                                  <td><a href='dokumen/$tLB1 $bb1[nm_dokumen]/$doku.jpg' target='_blank'> Download</a></td>
                                                  </tr>
                                                  ";
                                                  endforeach;*/
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