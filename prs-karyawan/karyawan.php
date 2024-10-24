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
  <div class="card col-lg-12">
<div class="card-body">
<h4 class="card-title"><i class="fa fa-user"></i> Data Pribadi</h4>
<div class="alert alert-info">
<h3 class="text-info"><i class="fa fa-info"></i> Informasi</h3> Untuk Perubahan Data Pribadi, Tidak Bisa Dirubah. Jika Ada Perubahan Biodata Dimohon Untuk Menghubungi Admin. Kecuali Untuk Password, Bisa Dirubah dan Segera Lakukan Ubah Password.
</div>
<form action="?gir=aksipribadi&a=ubah" method="post" enctype="multipart/form-data">
<input type="hidden" name="idk" value="<?php echo "$Q1[id_karyawan]"; ?>" >
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Nama Karyawan</label>
            <input type="text" class="form-control" placeholder="Masukan Nama Karyawan" name="nama" value="<?php echo "$Q1[nama]"; ?>" readonly>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" class="form-control" placeholder="Masukan Tempat Lahir" name="tempat_lhr" value="<?php echo "$Q1[tempat_lhr]"; ?>" readonly>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="text" class="form-control" placeholder="Masukan Tanggal Lahir" name="tgl_lahir" value="<?php echo "$tgl_indo1"; ?>" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            <label>Jabatan</label>
            <input type="text" class="form-control" placeholder="Masukan Jabatan" name="nama" value="<?php echo "$Q1[jbtn]"; ?>" readonly>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>Tanggal Masuk</label>
            <input type="text" class="form-control" placeholder="Masukan Tanggal Lahir" name="tgl_lahir" value="<?php echo "$tgl_indo2"; ?>" readonly>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>NPWP</label>
            <input type="text" class="form-control" placeholder="Masukan NPWP" name="tempat_lhr" value="<?php echo "$Q1[npwp]"; ?>" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
        <div class="alert alert-primary alert-rounded">Silahkan Ubah Password Anda di Bawah Ini.</div>
            <input type="password" class="form-control" placeholder="Masukan Password" name="kata_kunci" value="<?php echo "$Q1[jbtn]"; ?>" >
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Ubah Password</button>
    </div>
</div>  
  
</form>
</div>
</div>  
</section>
  <!-- /.content -->
</div>            
