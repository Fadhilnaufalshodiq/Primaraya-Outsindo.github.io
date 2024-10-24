<?php	
include '../assets/configdb/koneksi.php';
if(empty($_POST['email']) OR empty($_POST['password'])){
	echo "
        <script>
            alert('E-Mail Atau Password Harus Diisi');
            window.location.href='index.php';
        </script>
        ";
}else{
	$cekemail=mysqli_query($conn,"SELECT * FROM tb_pelamar WHERE email='$_POST[email]'");
	$cek=mysqli_num_rows($cekemail);
	if($cek==0){
		mysqli_query($conn,"INSERT INTO tb_pelamar (email,pass_pelamar) VALUES ('$_POST[email]',md5('$_POST[password]'))");
		echo "
        <script>
            alert('Selamat, Anda Telah Menjadi Pelamar Baru PT. Prima Raya Solusindo, Silahkan Login Untuk Masuk Ke Halaman Utama Pelamar dan Segera Lakukan Perubahan Biodata. Terima Kasih');
            window.location.href='index.php';
        </script>
        ";
	}else{
		echo "
        <script>
            alert('Email Sudah Terdaftar');
            window.location.href='index.php';
        </script>
        ";
    }
}

?>