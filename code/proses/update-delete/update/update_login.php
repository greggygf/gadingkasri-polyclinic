<?php
include "../../../../koneksi.php";
$IdUser = $_POST['IdUser'];
$Nama = $_POST['Nama'];
$JenisKelamin = $_POST['JenisKelamin'];
$Alamat = $_POST['Alamat'];
$NoTelp = $_POST['NoTelp'];
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$Level = $_POST['Level'];

session_start();
if($_SESSION['Level']=="Admin")
{
$updateLogin = "UPDATE useradmin set IdUser='$IdUser', Nama='$Nama', JenisKelamin='$JenisKelamin', Alamat='$Alamat', NoTelp='$NoTelp', Username='$Username', Password='$Password', Level='$Level' where IdUser='$IdUser'";

}
else
{
$updateLogin = "UPDATE useradmin set IdUser='$IdUser', Nama='$Nama', JenisKelamin='$JenisKelamin', Alamat='$Alamat', NoTelp='$NoTelp', Username='$Username', Password='$Password' where IdUser='$IdUser'";
}

$updateLogin_query = mysqli_query($connect,$updateLogin);

if ($updateLogin_query)
{
	if($_SESSION['Level']!="Superadmin")
	{
	header('location:../../../../halaman_utama.php?informasi_akun=$informasi_akun');
	}
	else
	{
	header('location:../../../../halaman_utama.php?tabel_login=$tabel_login');
	}
}
else
{
	echo "Update gagal dijalankan";
}

?>