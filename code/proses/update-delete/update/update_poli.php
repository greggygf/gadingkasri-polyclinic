<?php
include "../../../../koneksi.php";
$KodePoli = $_POST['KodePoli'];
$NamaPoli = $_POST['NamaPoli'];

$updatePoli = "UPDATE poli set KodePoli='$KodePoli' , NamaPoli='$NamaPoli' where KodePoli='$KodePoli'";

$updatePoli_query = mysqli_query($connect,$updatePoli);

if ($updatePoli_query)
{
	header('location:../../../../halaman_utama.php?tabel_poli=$tabel_poli');
}
else
{
	echo "Update gagal dijalankan";
}

?>