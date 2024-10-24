<?php
$Q1=mysqli_fetch_array(mysqli_query($conn,"SELECT k.*, b.`nm_bagian`, CONCAT(IF(LEFT(jabatan,1)=1,'Staff ',IF(LEFT(jabatan,1)=1,'Supervisor ','Manager ')),nm_bagian) jbtn 
FROM tb_karyawan k, tb_bagian b WHERE id_karyawan='$_SESSION[idkaryawan]' AND RIGHT(jabatan,1)=b.`id_bagian`"));
$tgl_indo1=tgl_indo($Q1['tgl_lahir']);
$tgl_indo2=tgl_indo($Q1['tgl_masuk']);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Cetak Paklaring</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item active">Cetak Paklaring</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
  <div class="card col-lg-12">
<div class="card-body">
<h4 class="card-title"><i class="fa fa-user"></i> Data Pribadi</h4>
<div class="alert alert-info">
<h3 class="text-info"><i class="fa fa-info"></i> Informasi</h3> 
<?php
    if($Q1['paklaring']=='0'){
        $info="Paklaring Belum Diupload, Silahkan Datang Ke Kantor untuk konfirmasi Upload Paklaring";
    }else{
        $info="Silahkan Download Paklaring <a href='../prs-admin/dokumen/upload_paklaring/$Q1[file_paklaring]'>Disini</a>";
    }
    echo "$info";
?>
</div>

</div>
</div>  
</section>
  <!-- /.content -->
</div>            
