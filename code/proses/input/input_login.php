<?php
include "../../../koneksi.php";
$IdUser = $_POST['IdUser'];
$Nama = $_POST['Nama'];
$JenisKelamin = $_POST['JenisKelamin'];
$Alamat = $_POST['Alamat'];
$NoTelp = $_POST['NoTelp'];
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$Level = $_POST['Level'];

$insertLogin = "INSERT INTO useradmin values ('$IdUser','$Nama','$JenisKelamin','$Alamat','$NoTelp','$Username','$Password','$Level')";

$insertLogin_query = mysqli_query($connect,$insertLogin);

if ($insertLogin_query)
{
	header('location:../../../halaman_utama.php?tabel_login=$tabel_login');
}
else
{
	echo "Insert gagal dijalankan";
}

?>