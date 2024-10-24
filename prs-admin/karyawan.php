
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Karyawan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item active">Data Karyawan</li>
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
              <h3 class="card-title">Data Karyawan </h3>
            </div>
            <div class="card-body">
            <a href="?isi=datakaryawan&aksi=tambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data Karyawan </a> 
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NRK</th>
                  <th>Nama</th>
                  <th>Tempat, Tgl. Lahir</th>
                  <th>Jabatan, Bagian</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $qb1=mysqli_query($conn,"SELECT k.*, b.`nm_bagian`, 
                    IF(LEFT(jabatan,1)=1,'Staff',IF(LEFT(jabatan,1)=2,'Supervisor','Manager')) jbtn 
                    FROM tb_karyawan k, tb_bagian b WHERE nrk!='primaraya' AND RIGHT(jabatan,1)=id_bagian");
                  
                    while($b1=mysqli_fetch_array($qb1)){
                        $tgl_indo=tgl_indo($b1['tgl_lahir']);
                      if($b1['status']==1){
                        $status="Aktif";
                        $form="
                        <a href='?isi=datakaryawan&aksi=ubah&id=$b1[id_karyawan]' class='btn btn-primary'><i class='fa fa-edit'></i> Ubah </a> || 
                        <a href='?isi=datakaryawan&aksi=hapus&id=$b1[id_karyawan]' class='btn btn-danger'><i class='fa fa-trash'></i> Hapus</a> 
                        ";
                      }else{
                        $status="Non Aktif";
                        $form="
                        <form name='uploadpaklaring' method='post' action='?isi=datakaryawan&aksi=uploadpaklaring' enctype='multipart/form-data'>
                          <input type='hidden' name='id' value='$b1[id_karyawan]' >
                          <p style='color: red'>Ekstensi yang diperbolehkan .pdf dan Maksimal 5MB</p><br>
                          <p><input type='file' name='paklaring'><input type='submit' name='submit' value='Upload' class='btn btn-success'></p>
                        </form>
                        ";
                      }
                      echo "
                      <tr>
                        <td>$b1[NRK]</td>
                        <td>$b1[nama]</td>
                        <td>$b1[tempat_lhr], $tgl_indo</td>
                        <td>$b1[jbtn], $b1[nm_bagian]</td>
                        <td>$status</td>
                        <td>$form
                        </td>
                      </tr>
                      ";
                    }

                  ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>NRK</th>
                  <th>Nama</th>
                  <th>Tempat, Tgl. Lahir</th>
                  <th>Jabatan, Bagian</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
</section>
  <!-- /.content -->
</div>            
