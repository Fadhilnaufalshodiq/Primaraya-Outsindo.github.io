<?php
if(empty($_GET['isi'])){
	include "konten.php";
}elseif($_GET['isi']=="pengguna"){
	include "pengguna.php";
}elseif($_GET['isi']=="dataadmin"){
	include "dataadmin.php";
}elseif($_GET['isi']=="pelamar"){
	include "pelamar.php";
}elseif($_GET['isi']=="detailpelamar"){
	include "detailpelamar.php";
}elseif($_GET['isi']=="simpanpelamar"){
	include "simpanbiodata.php";
}elseif($_GET['isi']=="ubahpelamar"){
	include "ubahpelamar.php";
}elseif($_GET['isi']=="datakaryawan"){
	include "datakaryawan.php";
}elseif($_GET['isi']=="karyawan"){
	include "karyawan.php";
}elseif($_GET['isi']=="dokumen"){
	include "dokumen.php";
}elseif($_GET['isi']=="datadokumen"){
	include "datadokumen.php";
}elseif($_GET['isi']=="bagian"){
	include "bagian.php";
}elseif($_GET['isi']=="databagian"){
	include "databagian.php";
}elseif($_GET['isi']=="lowongan"){
	include "lowongan.php";
}elseif($_GET['isi']=="datalowongan"){
	include "datalowongan.php";
}elseif($_GET['isi']=="ubahtransaksi"){
	include "ubahtransaksi.php";
}elseif($_GET['isi']=="logout"){
	include "logout.php";
}else{
	include "konten.php";
}

?>