<?php
include "../../../koneksi.php";
$KodePoli = $_POST['KodePoli'];
$NamaPoli = $_POST['NamaPoli'];

$insertPoli = "INSERT INTO poli values ('$KodePoli','$NamaPoli')";

$insertPoli_query = mysqli_query($connect,$insertPoli);

if ($insertPoli_query)
{
	header('location:../../../halaman_utama.php?tabel_poli=$tabel_poli');
}
else
{
	echo "Insert gagal dijalankan";
}
?>