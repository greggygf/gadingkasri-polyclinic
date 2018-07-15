<?php
include "../../../../koneksi.php";
$KodeDokter = $_POST['KodeDokter'];
$NamaDokter = $_POST['NamaDokter'];
$Spesialis = $_POST['Spesialis'];
$AlamatDokter = $_POST['AlamatDokter'];
$TeleponDokter = $_POST['TeleponDokter'];
$Tarif = $_POST['Tarif'];
$KodePoli = $_POST['KodePoli'];

$updateDokter = "UPDATE dokter set KodeDokter='$KodeDokter' , NamaDokter='$NamaDokter', Spesialis='$Spesialis' , AlamatDokter='$AlamatDokter' , TeleponDokter='$TeleponDokter' , Tarif='$Tarif' where KodeDokter='$KodeDokter'";

$updateDokter_query = mysqli_query($connect,$updateDokter);

if ($updateDokter_query)
{
	header('location:../../../../halaman_utama.php?tabel_dokter=$tabel_dokter');
}
else
{
	echo "Update gagal dijalankan";
}

?>