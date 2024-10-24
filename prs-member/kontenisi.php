<?php
if(empty($_GET['isi'])){
	include "konten.php";
}elseif($_GET['isi']=="biodata"){
	include "lihatbiodata.php";
}elseif($_GET['isi']=="simpanbiodata"){
	include "simpanbiodata.php";
}elseif($_GET['isi']=="pendidikan"){
	include "pendidikan.php";
}elseif($_GET['isi']=="tambahpendidikan"){
	include "tambahpendidikan.php";
}elseif($_GET['isi']=="pengalaman"){
	include "pengalaman.php";
}elseif($_GET['isi']=="tambahpengalaman"){
	include "tambahpengalaman.php";
}elseif($_GET['isi']=="lowongan"){
	include "lowongan.php";
}elseif($_GET['isi']=="datalowongan"){
	include "datalowongan.php";
}elseif($_GET['isi']=="riwayat"){
	include "riwayat.php";
}elseif($_GET['isi']=="logout"){
	include "logout.php";
}else{
	include "konten.php";
}

?>