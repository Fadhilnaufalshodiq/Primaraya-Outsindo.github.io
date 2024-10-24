<?php
if(empty($_GET['isi'])){
	include "konten.php";
}elseif($_GET['isi']=="cetakpaklaring"){
	include "cetakpaklaring.php";
}elseif($_GET['isi']=="karyawan"){
	include "karyawan.php";
}else{
	include "konten.php";
}

?>