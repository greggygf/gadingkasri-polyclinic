<?php
include "../../../koneksi.php";
$KodeObat = $_POST['KodeObat'];
$NamaObat = $_POST['NamaObat'];
$JenisObat = $_POST['JenisObat'];
$Kategori = $_POST['Kategori'];
$HargaObat = $_POST['HargaObat'];
$StokObat = $_POST['StokObat'];

$insertObat = "INSERT INTO obat values ('$KodeObat','$NamaObat','$JenisObat','$Kategori','$HargaObat','$StokObat')";

$insertObat_query = mysqli_query($connect,$insertObat);

if ($insertObat_query)
{
	header('location:../../../halaman_utama.php?tabel_obat=$tabel_obat');
}
else
{
	echo "Insert gagal dijalankan";
}

?>