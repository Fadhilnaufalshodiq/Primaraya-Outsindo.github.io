<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pelamar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Pelamar</li>
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
                    <h3 class="card-title">Data Pelamar </h3>
                </div>
                <div class="card-body">
                    <?php //<a href="?isi=datapelamar&aksi=tambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data Pelamar </a> ?>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>E-Mail</th>
                                <th>Nama Pelamar</th>
                                <th>Tempat, Tgl. Lahir</th>
                                <th>No. Handphone</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    $qb1=mysqli_query($conn,"SELECT * FROM tb_pelamar");
                    $no=1;
                    while($b1=mysqli_fetch_array($qb1)){
                        $tgl_indo=tgl_indo($b1['tgl_lahir']);
                        if (isset($b1['status_pelamar'])) {
                          if ($b1['status_pelamar'] == 1) {
                              $status = "Aktif";
                              $tombol = "<a href='?isi=detailpelamar&aksi=hapus&id=$b1[id_pelamar]' class='btn btn-danger'><i class='fa fa-trash'></i> Hapus</a>";
                          } else {
                              $status = "Non Aktif";
                              $tombol = "<a href='?isi=detailpelamar&aksi=aktif&id=$b1[id_pelamar]' class='btn btn-success'><i class='fa fa-check'></i> Aktif</a>";
                          }
                      } else {
                          // Tangani kondisi jika 'status_pelamar' tidak ada
                          $status = "Status tidak ditemukan";
                          $tombol = ""; // Atau berikan tombol default
                      }
                      
                      echo "
                      <tr>
                        <td>$no</td>
                        <td>$b1[email]</td>
                        <td>$b1[nama_pelamar]</td>
                        <td>$b1[t_lahir], $tgl_indo</td>
                        <td>$b1[nomor_hp]</td>
                        <td>$status</td>
                        <td>
                        <a href='?isi=detailpelamar&aksi=detail&id=$b1[id_pelamar]' class='btn btn-primary'><i class='fa fa-eye'></i> Detail </a> || 
                        $tombol
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
                                <th>E-Mail</th>
                                <th>Nama Pelamar</th>
                                <th>Tempat, Tgl. Lahir</th>
                                <th>No. Handphone</th>
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