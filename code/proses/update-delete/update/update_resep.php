<?php
include "../../../../koneksi.php";
$NomorResep = $_POST['NomorResep'];
$TanggalTebus = $_POST['TanggalTebus'];
$TotalHarga = $_POST['TotalHarga'];
$Bayar = $_POST['Bayar'];
$NoDaftar = $_POST['NoDaftar'];
$Kembali = $Bayar-$TotalHarga;
session_start();
$IdUser = $_SESSION['IdUser'];

$updateResep = "UPDATE resep set TanggalTebus='$TanggalTebus' , TotalHarga='$TotalHarga' , Bayar='$Bayar' , Kembali='$Kembali' , IdUser='$IdUser' where NomorResep='$NomorResep'";

$updateResep_query = mysqli_query($connect,$updateResep);

if ($updateResep_query)
{
	header('location:../../../../halaman_utama.php?tabel_resep=$tabel_resep');
}
else
{
	echo "Update gagal dijalankan";
}

?>