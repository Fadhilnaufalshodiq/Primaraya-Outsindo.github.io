
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Halaman Utama</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Beranda</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                //$k1=mysqli_num_rows(mysqli_query($conn,"SELECT jenis_kendaraan FROM tb_milik_kendaraan mk, tb_kendaraan tk WHERE mk.id_kendaraan=tk.`id_kendaraan` AND id_pelanggan='$_SESSION[idpel]' AND jenis_kendaraan='Motor'"));
                ?>
                <h3><?php //echo "$k1"; ?></h3>

                <p>Data Pendidikan</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-bicycle"></i>
              </div>
              <a href="?isi=roda2" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                //$k2=mysqli_num_rows(mysqli_query($conn,"SELECT jenis_kendaraan FROM tb_milik_kendaraan mk, tb_kendaraan tk WHERE mk.id_kendaraan=tk.`id_kendaraan` AND id_pelanggan='$_SESSION[idpel]' AND jenis_kendaraan='Mobil'"));
                ?>
                <h3><?php //echo "$k2"; ?></h3>

                <p>Pengalaman Kerja</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-car"></i>
              </div>
              <a href="?isi=roda4" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                //$k3=mysqli_num_rows(mysqli_query($conn,"SELECT no_servis FROM tb_servis WHERE id_pelanggan='$_SESSION[idpel]'"));
                ?>
                <h3><?php //echo "$k3"; ?></h3>

                <p>Lowongan Pekerjaan</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="?isi=transaksi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-globe"></i>
                  Selamat Datang Di Halaman Pelamar PT. Prima Raya Solusindo
                </h3>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
            <!--/.direct-chat -->

            <!-- TO DO List -->
            
              <!-- /.card-header -->
              
              <!-- /.card-body -->
              
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