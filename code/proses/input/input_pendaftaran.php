<?php
include "../../../koneksi.php";
$NoDaftar = $_POST['NoDaftar'];
$KodePasien = $_POST['KodePasien'];
$KodeDokter = $_POST['KodeDokter'];
session_start();
$IdUser = $_SESSION['IdUser'];

$insertPendaftaran = "INSERT INTO pendaftaran values ('$NoDaftar',now(),'$KodePasien','$KodeDokter','$IdUser')";

$insertPendaftaran_query = mysqli_query($connect,$insertPendaftaran);

if ($insertPendaftaran_query)
{
	header('location:../../../halaman_utama.php?tabel_pendaftaran=$tabel_pendaftaran');
}
else
{
	echo "Insert gagal dijalankan";
}

?>