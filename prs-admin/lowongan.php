
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Lowongan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item active">Data Lowongan</li>
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
              <h3 class="card-title">Data Lowongan </h3>
            </div>
            <div class="card-body">
            <a href="?isi=datalowongan&aksi=tambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data Lowongan </a> 
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Kualifikasi</th>
                  <th>Benefit</th>
                  <th>Catatan</th>
                  <th>Tanggal Akhir</th>
                  <th>Jumlah Pelamar</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $qb1=mysqli_query($conn,"SELECT l.*,m.total FROM tb_loker l LEFT JOIN  
                    (SELECT id_loker, COUNT(id_pelamar) total FROM tb_lamaran GROUP BY id_loker) m 
                    ON l.id_loker=m.id_loker");
                    $no=1;
                    while($b1=mysqli_fetch_array($qb1)){
                      echo "
                      <tr>
                        <td>$no</td>
                        <td>$b1[kualifikasi]</td>
                        <td>$b1[benefit]</td>
                        <td>$b1[catatan]</td>
                        <td>$b1[tgl_akhir_tayang]</td>
                        <td>$b1[total]</td>
                        <td>
                        <a href='?isi=datalowongan&aksi=detail&id=$b1[id_loker]' class='btn btn-primary'><i class='fa fa-eye'></i> Detail </a> || 
                        <a href='?isi=datalowongan&aksi=hapus&id=$b1[id_loker]' class='btn btn-danger'><i class='fa fa-trash'></i> Hapus</a> 
                        </td>
                      </tr>
                      ";
                      $no++;
                    }

                  ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Kualifikasi</th>
                  <th>Benefit</th>
                  <th>Catatan</th>
                  <th>Tanggal Akhir</th>
                  <th>Jumlah Pelamar</th>
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
