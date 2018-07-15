<?php
include "../../../koneksi.php";
$NomorResep = $_POST['NomorResep'];
$TanggalTebus = $_POST['TanggalTebus'];
$TotalHarga = $_POST['TotalHarga'];
$Bayar = $_POST['Bayar'];
$NoDaftar = $_POST['NoDaftar'];
session_start();
$IdUser = $_SESSION['IdUser'];
$Kembali = $Bayar-$TotalHarga;

$insertResep = "INSERT INTO resep values ('$NomorResep','$TanggalTebus','$TotalHarga','$Bayar','$Kembali','$NoDaftar','$IdUser')";

$insertResep_query = mysqli_query($connect,$insertResep);

if ($insertResep_query)
{
	header('location:../../../halaman_utama.php?tabel_resep=$tabel_resep');
}
else
{
	echo "Insert gagal dijalankan";
}

?>