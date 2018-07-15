<?php
	include "koneksi.php";
	$Username=$_POST['Username']; // simpan data username dari form ke variabel
	$Password=$_POST['Password']; // simpan data password dari form ke variabel
	$login=
	"SELECT * from useradmin where Username='$Username' AND Password='$Password'";
	
	$login_query=mysqli_query($connect,$login);
	$data=mysqli_fetch_array($login_query);
	
	if($data)
	{
		session_start();
		$_SESSION['Username'] = $data['Username'];
		$_SESSION['Password'] = $data['Password'];
		$_SESSION['Level'] = $data['Level'];
		$_SESSION['Nama'] = $data['Nama'];
		$_SESSION['IdUser'] = $data['IdUser'];
		header('location:halaman_utama.php?home=$home');
	}
	else
	{
		echo "
		<script type='text/javascript'>
		alert('Username atau Password anda salah!')
		window.location='index.php';
		</script>";
	}
?>