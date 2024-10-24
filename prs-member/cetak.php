<?php
include "../assets/koneksi.php";
$sql1=mysqli_query($conn,"SELECT * FROM tb_servis WHERE id_servis='$_GET[id]'");
$t1=mysqli_fetch_array($sql1);

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/invoice/invoice.css">
  
<!--Author      : @arboshiki-->
<div id="invoice">
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://lobianijs.com">
                            <img src="../assets/img/logos/bmlogo.jpeg" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://bengkel-marbun.online">
                            Bengkel Marbun Jakarta
                            </a>
                        </h2>
                        <div>Jl. Robusta Raya, Rt.1/RW.7, Pondok. Kopi, Kec. Duren Sawit Jakarta Timur</div>
                        <div>0812-8684-3919</div>
                        <div>admin-bengkel@bengkel-marbun.online</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">Data Pelanggan:</div>
                        <h2 class="to"><?php 
                        $t2=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM tb_pelanggan WHERE id_pelanggan='$t1[id_pelanggan]'"));
                        echo "$t2[nm_pelanggan]"; ?></h2>
                        <div class="address"><?php echo "$t2[alamat]"; ?></div>
                        <div class="email"><?php echo "$t2[email]"; ?></a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id"><?php echo "$t1[no_servis]"; ?></h1>
                        <?php
                        $t21=mysqli_fetch_array(mysqli_query($conn,"SELECT id_milik, tk.id_kendaraan, CONCAT(tk.`tipe_kendaraan`,' ', tk.`jenis_kendaraan`) tipe_motor, tk.`cc_kendaraan`, tm.`nama_kendaraan`,
tm.`no_plat`, tm.`tahun_pembuatan` FROM tb_kendaraan tk, tb_milik_kendaraan tm
WHERE tk.`id_kendaraan`=tm.`id_kendaraan` AND id_milik='$t1[id_milik]'"));
                        ?>
                        <div class="date">Tanggal Booking : <?php $tgl=tgl_indo($t1['tgl_servis']); echo "$tgl"; ?></div>
                        <div class="date">Data Kendaraan : <?php echo "$t21[tipe_motor] $t21[nama_kendaraan] $t21[cc_kendaraan] CC"; ?></div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">Jenis Servis dan Sparepart</th>
                            <th class="text-right">Jasa Servis</th>
                            <th class="text-right">Harga Sparepart</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql2=mysqli_query($conn,"SELECT * FROM tb_detail_servis WHERE no_servis='$t1[no_servis]'");
                        $no=1;
                        while($t3=mysqli_fetch_array($sql2)){
                            $t4=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM tb_sparepart WHERE id_sp='$t3[id_sp]'"));
                            $t5=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM tb_jenis_servis WHERE id_jenis='$t3[id_jenis_servis]'"));
                            $total=$t4['harga']+$t5['harga'];
                            echo "
                                <tr>
                                    <td class='no'>$no</td>
                                    <td class='text-left'><h3>$t5[nm_servis]</h3>
                                    Sparepart : $t4[nm_sp]
                                    </td>
                                    <td class='unit'>Rp. $t5[harga]</td>
                                    <td class='qty'>Rp. $t4[harga]</td>
                                    <td class='total'>Rp. $total</td>
                                </tr>
                            ";
                        $no++;
                        }

                        ?>
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Total Keseluruhan</td>
                            <td><?php echo "Rp. $t1[total_biaya]"; ?></td>
                        </tr>
                        
                    </tfoot>
                </table>
                <br>
                <br>
                <br>
                <div class="thanks">Terima Kasih!</div>
                <div class="notices">
                    <div>Keluhan Tambahan:</div>
                    <div class="notice"><?php echo "$t1[keluhan]"; ?></div>
                </div>
            </main>
            <footer>
                 Bukti Ini adalah Sah Walaupun Tidak Ada Tanda Tangan Atau Stempel Bengkel.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>