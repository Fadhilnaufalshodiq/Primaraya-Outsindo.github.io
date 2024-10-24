<?php
$conn=mysqli_connect("localhost","root","");  
mysqli_select_db($conn,"db_kantor");


function tgl_indo($tanggal) {
    $bln_indo = array (
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // Cek apakah array memiliki setidaknya 3 elemen
    if (count($pecahkan) < 3) {
        return 'Tanggal tidak valid';
    }

    return $pecahkan[2] . ' ' . $bln_indo[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

?>