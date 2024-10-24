<?php
if($_GET['aksi']=="detail"){
$b1=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM tb_pelamar WHERE id_pelamar='$_GET[id]'"))
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Detail Pelamar</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="pengguna.php">Home</a></li>
                <li class="breadcrumb-item active">Detail Pelamar</li>
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
                            <h3 class="card-title">Detail Pelamar </h3>
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
                                            
                                    </div>         
                                <?php
                                $SQLLoker=mysqli_query($conn, "SELECT * FROM tb_pendidikan WHERE id_pelamar='$_GET[id]'");
                                ?>
                                <div class="card-body">
                                <center><h1>Pendidikan Pelamar</h1></center>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Jenjang</th>
                                            <th>Nama Sekolah</th>
                                            <th>Kota</th>
                                            <th>Program Studi</th>
                                            <th>NEM/IPK</th>
                                            <th>Tahun Lulus</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                while($p=mysqli_fetch_array($SQLLoker)){
                                                    echo "
                                                    <tr>
                                                        <td>$no</td>
                                                        <td>$p[jenjang]</td>
                                                        <td>$p[nama_sekolah]</td>
                                                        <td>$p[kota]</td>
                                                        <td>$p[program_studi]</td>
                                                        <td>$p[nem_ipk]</td>
                                                        <td>$p[tahun]</td>
                                                    </tr>";
                                                }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Jenjang</th>
                                            <th>Nama Sekolah</th>
                                            <th>Kota</th>
                                            <th>Program Studi</th>
                                            <th>NEM/IPK</th>
                                            <th>Tahun Lulus</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>  
                                <div class="card-body">
                                    <center><h1>Pengalaman Bekerja</h1></center>
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tahun Bekerja</th>
                                            <th>Nama Perusahaan/Instansi</th>
                                            <th>Pekerjaan</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                $SQLLoker1=mysqli_query($conn, "SELECT * FROM tb_pengalaman WHERE id_pelamar='$_GET[id]'");
                                                while($p1=mysqli_fetch_array($SQLLoker1)){
                                                    echo "
                                                    <tr>
                                                        <td>$no</td>
                                                        <td>$p1[tahun]</td>
                                                        <td>$p1[perusahaan]</td>
                                                        <td>$p1[pekerjaan]</td>
                                                    </tr>";
                                                }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tahun Bekerja</th>
                                            <th>Nama Perusahaan/Instansi</th>
                                            <th>Pekerjaan</th>
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
}elseif($_GET['aksi']=="hapus"){
    mysqli_query($conn, "UPDATE tb_pelamar SET status_pelamar='0' WHERE id_pelamar='$_GET[id]'");
    echo "
    <script>
        alert('Data Berhasil Terhapus');
        window.location.href='?isi=pelamar';
    </script>
    ";	
}elseif($_GET['aksi']=="aktif"){
    mysqli_query($conn, "UPDATE tb_pelamar SET status_pelamar='1' WHERE id_pelamar='$_GET[id]'");
    echo "
    <script>
        alert('Data Berhasil Diaktifkan Kembali');
        window.location.href='?isi=pelamar';
    </script>
    ";	
}else{
?>
<?php
$b1=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM tb_pelamar WHERE id_pelamar='$_GET[id]'"))
?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Detail Pelamar</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="pengguna.php">Home</a></li>
                <li class="breadcrumb-item active">Detail Pelamar</li>
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
                            <h3 class="card-title">Detail Pelamar </h3>
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
                                            
                                    </div>         
                                <?php
                                $SQLLoker=mysqli_query($conn, "SELECT * FROM tb_pendidikan WHERE id_pelamar='$_GET[id]'");
                                ?>
                                <div class="card-body">
                                <center><h1>Pendidikan Pelamar</h1></center>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Jenjang</th>
                                            <th>Nama Sekolah</th>
                                            <th>Kota</th>
                                            <th>Program Studi</th>
                                            <th>NEM/IPK</th>
                                            <th>Tahun Lulus</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                while($p=mysqli_fetch_array($SQLLoker)){
                                                    echo "
                                                    <tr>
                                                        <td>$no</td>
                                                        <td>$p[jenjang]</td>
                                                        <td>$p[nama_sekolah]</td>
                                                        <td>$p[kota]</td>
                                                        <td>$p[program_studi]</td>
                                                        <td>$p[nem_ipk]</td>
                                                        <td>$p[tahun]</td>
                                                    </tr>";
                                                }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Jenjang</th>
                                            <th>Nama Sekolah</th>
                                            <th>Kota</th>
                                            <th>Program Studi</th>
                                            <th>NEM/IPK</th>
                                            <th>Tahun Lulus</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>  
                                <div class="card-body">
                                    <center><h1>Pengalaman Bekerja</h1></center>
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tahun Bekerja</th>
                                            <th>Nama Perusahaan/Instansi</th>
                                            <th>Pekerjaan</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                $SQLLoker1=mysqli_query($conn, "SELECT * FROM tb_pengalaman WHERE id_pelamar='$_GET[id]'");
                                                while($p1=mysqli_fetch_array($SQLLoker1)){
                                                    echo "
                                                    <tr>
                                                        <td>$no</td>
                                                        <td>$p1[tahun]</td>
                                                        <td>$p1[perusahaan]</td>
                                                        <td>$p1[pekerjaan]</td>
                                                    </tr>";
                                                }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tahun Bekerja</th>
                                            <th>Nama Perusahaan/Instansi</th>
                                            <th>Pekerjaan</th>
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
}
  ?>