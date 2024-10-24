
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Riwayat Pekerjaan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item active">Riwayat Pekerjaan</li>
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
              <h3 class="card-title">Riwayat Pekerjaan </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kualifikasi</th>
                  <th>Benefit</th>
                  <th>Catatan</th>
                  <th>Tanggal Akhir</th>
                  <th>Status</th>
                  <th>Jumlah Pelamar</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $qb1=mysqli_query($conn,"SELECT * FROM tb_loker lo, tb_lamaran la WHERE lo.id_loker=la.id_loker AND id_pelamar='$_SESSION[idpel]' AND status_lamaran='2' ORDER BY tgl_awal_tayang ASC");
                    $no=1;
                    while($b1=mysqli_fetch_array($qb1)){
                      /*if($b1['status_lamaran']==0){
                        $stl="Belum Diperiksa";
                      }elseif($b1['status_lamaran']==1){
                        $stl="Proses Interview";
                      }elseif($b1['status_lamaran']==2){
                        $stl="Cetak PKWT";
                      }elseif($b1['status_lamaran']==3){
                        $stl="Revisi Dokumen";
                      }else{
                        $stl="Ditolak";
                      }*/
                        $qq=mysqli_query($conn,"SELECT * FROM tb_lamaran WHERE id_loker='$b1[id_loker]' AND id_pelamar='$_SESSION[idpel]'");
                        $cl=mysqli_num_rows($qq);
                        if($cl==0){
                            $button="<a href='?isi=datalowongan&aksi=detail&id=$b1[id_loker]' class='btn btn-primary'><i class='fa fa-eye'></i> Lamar </a>";
                            $stl="Belum Melamar";
                        }else{
                            $q1=mysqli_fetch_array($qq);
                            
                            if($q1['status_lamaran']==0){
                              $stl="Belum Diperiksa";
                              $button="<span class='btn btn-success'><i class='fa fa-check'></i> Sudah Melamar</a>";
                            }elseif($q1['status_lamaran']==1){
                              $stl="Proses Interview";
                              $button="<span class='btn btn-success'><i class='fa fa-check'></i> Sudah Melamar</a>";
                            }elseif($q1['status_lamaran']==2){
                              $stl="Cetak PKWT";
                              $button="<a href='../prs-admin/dokumen/upload_pkwt/$q1[pkwt]' class='btn btn-secondary'><i class='fa fa-check'></i> Download PKWT</a>";
                            }else{
                              $stl="Ditolak";
                            }
                            
                        }
                        $tt=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(id_loker) total 
                        FROM tb_lamaran WHERE id_loker='$b1[id_loker]' GROUP BY id_loker"));
                        if(isset($tt['total'])){
                          $total=$tt['total'];
                        }else{
                          $total="0";
                        }
                      echo "
                      <tr>
                        <td>$no</td>
                        <td>$b1[kualifikasi]</td>
                        <td>$b1[benefit]</td>
                        <td>$b1[catatan]</td>
                        <td>$b1[tgl_akhir_tayang]</td>
                        <td>$stl</td>
                        <td>$total</td>
                        <td>
                         $button
                        </td>
                      </tr>
                      ";
                      $no++;
                    }

                  ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Kualifikasi</th>
                  <th>Benefit</th>
                  <th>Catatan</th>
                  <th>Tanggal Akhir</th>
                  <th>Status</th>
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
