<?php
ob_start();
session_start();
include '../assets/configdb/koneksi.php';


if(empty($_POST['email']) OR empty($_POST['password']) ){
 echo "
        <script>
            alert('Login Tidak Berhasil!');
            window.location.href='index.php';
        </script>
        ";		
}else{
	$email = $_POST['email'];
	$password = $_POST['password'];

	$login = mysqli_query($conn,"SELECT * FROM tb_pelamar WHERE email='$email' AND pass_pelamar=md5('$password')");
	$cek = mysqli_num_rows($login);
	$data1=mysqli_fetch_array($login) ;
	if($cek > 0){
		$_SESSION["email"] = $email;
		$_SESSION["idpel"] = $data1['id_pelamar'];
		$_SESSION["nmpel"] = $data1['nama_pelamar'];
		$_SESSION["status"] = "login";
		
		echo "<script> document.location.href='cust.php'; </script>";
	}
	else{
        echo "
        <script>
            alert('Login Tidak Berhasil!');
            window.location.href='index.php';
        </script>
        ";
	}

}
?>