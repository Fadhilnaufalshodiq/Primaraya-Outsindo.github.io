<?php
ob_start();
session_start();
include '../assets/configdb/koneksi.php';


if(empty($_POST['username']) OR empty($_POST['password']) ){
 echo "
        <script>
            alert('Login Tidak Berhasil!');
            window.location.href='index.php';
        </script>
        ";		
}else{
	$uname = $_POST['username'];
	$password = md5($_POST['password']);	
	$login = mysqli_query($conn,"SELECT * FROM tb_karyawan WHERE NRK='$uname' AND kata_kunci='$password'");
	$cek = mysqli_num_rows($login);
	$data1=mysqli_fetch_array($login) ;	
	var_dump($data1);
	if($data1['status']=="1"){
		if($cek > 0){
		$_SESSION["uname"] = $uname;
		$_SESSION["idkaryawan"] = $data1['id_karyawan'];
		$_SESSION["jabatan"] = $data1['jabatan'];
		$_SESSION["status"] = $data1['status'];;
		
		echo "<script> document.location.href='admin.php'; </script>";
		}
		else{
        echo "
        <script>
            alert('Login Tidak Berhasil!');
            window.location.href='index.php';
        </script>
        ";
		}
	}else{
		echo "
        <script>
            alert('Status Anda Sudah Tidak Aktif, Hubungi Pihak Administrator');
            window.location.href='cetakpaklaring.php';
        </script>
        ";
	}

}
?>