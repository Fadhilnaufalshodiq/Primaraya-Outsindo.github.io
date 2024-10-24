<?php

$qb1=mysqli_query($conn,"SELECT * FROM tb_pelamar WHERE id_pelamar='$_SESSION[idpel]'");
$b1=mysqli_fetch_array($qb1);

if($b1['status_hubungan']==0){
  $status_h="Belum Menikah";
}elseif($b1['status_hubungan']==1){
  $status_h="Menikah";
}else{
  $status_h="Janda/Duda";
}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pribadi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="cust.php">Home</a></li>
              <li class="breadcrumb-item active">Ubah Biodata</li>
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
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-user"></i>
                  Pengaturan Data Pribadi
                </h3>
              </div>
              <!-- /.END card-header -->
              <div class="card-body">
                <form action="?isi=simpanbiodata" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <center><img src=<?php echo "dist/img/$b1[foto_pelamar]"; ?> width="300px" height="300px"></center>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file"  name="foto" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-upload foto -->
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama Lengkap (tanpa gelar)</label>
                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?php echo "$b1[nama_pelamar]"; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Status Pernikahan</label>
                        <select name="status_nikah" class="form-control" style="width: 100%;" >
                        
                        <option value="<?php echo "$b1[status_hubungan]"; ?>" selected="selected"><?php echo "$status_h"; ?></option>
                        <option value="1">Menikah</option>
                        <option value="2">Janda/Duda</option>
                        <option value="0">Belum Menikah</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama Panggilan</label>
                        <input type="text" class="form-control" placeholder="Nama Panggilan" name="nama_panggilan" value="<?php //echo "$b1[nm_pelanggan]"; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Agama</label>
                        <input type="text" class="form-control" placeholder="Agama" name="agama" value="<?php // echo "$b1[nohp]"; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>No. KTP</label>
                        <input type="number" class="form-control" placeholder="Nomor KTP" name="noktp" value="<?php //echo "$b1[nm_pelanggan]"; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Telepon Rumah</label>
                        <input type="text" class="form-control" placeholder="Telepon Rumah" name="telp" value="<?php // echo "$b1[nohp]"; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" value="<?php //echo "$b1[nm_pelanggan]"; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nomor Handphone</label>
                        <input type="text" class="form-control" placeholder="Nomor Handphone" name="nohp" value="<?php // echo "$b1[nohp]"; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="text" class="form-control" placeholder="1999-12-31 Tahun-Bulan-Tanggal" name="tgl_lahir" value="<?php //echo "$b1[nm_pelanggan]"; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama Ibu Kandung</label>
                        <input type="text" class="form-control" placeholder="Nama Ibu Kandung" name="nm_ibu" value="<?php // echo "$b1[nohp]"; ?>">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="alamat"><?php // echo "$b1[alamat]"; ?></textarea>
                      </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Kota</label>
                        <input type="text" class="form-control" placeholder="Kota" name="kota" value="<?php //echo "$b1[nm_pelanggan]"; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Kode POS</label>
                        <input type="text" class="form-control" placeholder="Kode POS" name="kd_pos" value="<?php // echo "$b1[nohp]"; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Lama Tinggal</label>
                        <input type="number" class="form-control" placeholder="Lama Tinggal" name="lama" value="<?php //echo "$b1[nm_pelanggan]"; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Status Tempat Tinggal</label>
                        <input type="text" class="form-control" placeholder="Status Tempat Tinggal" name="status_tempat" value="<?php // echo "$b1[nohp]"; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Kendaraan Yang Digunakan</label>
                        <input type="text" class="form-control" placeholder="Kendaraan Yang Digunakan" name="kendaraan" value="<?php //echo "$b1[nm_pelanggan]"; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="Email" name="email" value="<?php // echo "$b1[nohp]"; ?>">
                      </div>
                    </div>
                    <div class="card-header col-sm-12">
                      <h3 class="card-title">
                      <i class="fas fa-user"></i>
                        Kontak Darurat
                      </h3>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama Kontak Darurat</label>
                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_emergency" value="<?php //echo "$b1[nm_pelanggan]"; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Hubungan</label>
                        <input type="text" class="form-control" placeholder="Hubungan" name="hubungan" value="<?php // echo "$b1[nohp]"; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Telepon Rumah</label>
                        <input type="text" class="form-control" placeholder="Telepon Rumah" name="no_telp" value="<?php //echo "$b1[nm_pelanggan]"; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nomor Handphone</label>
                        <input type="text" class="form-control" placeholder="Nomor Handphone" name="nohp_emergency" value="<?php // echo "$b1[nohp]"; ?>">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="alamat"><?php // echo "$b1[alamat]"; ?></textarea>
                      </div>
                      </div>
                    </div>
                    
              </div>
              <button type="submit" class="btn btn-primary">Ubah</button>
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
