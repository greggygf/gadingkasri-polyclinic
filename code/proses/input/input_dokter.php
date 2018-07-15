<?php
include "../../../koneksi.php";
$KodeDokter = $_POST['KodeDokter'];
$NamaDokter = $_POST['NamaDokter'];
$Spesialis = $_POST['Spesialis'];
$AlamatDokter = $_POST['AlamatDokter'];
$TeleponDokter = $_POST['TeleponDokter'];
$Tarif = $_POST['Tarif'];
$KodePoli = $_POST['KodePoli'];

$insertDokter = "INSERT INTO dokter values ('$KodeDokter','$NamaDokter','$Spesialis','$AlamatDokter','$TeleponDokter','$Tarif','$KodePoli')";

$insertDokter_query = mysqli_query($connect,$insertDokter);

if ($insertDokter_query)
{
	header('location:../../../halaman_utama.php?tabel_dokter=$tabel_dokter');
}
else
{
	echo "Insert gagal dijalankan";
}

?>