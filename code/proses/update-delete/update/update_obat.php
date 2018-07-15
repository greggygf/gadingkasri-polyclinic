<?php
include "../../../../koneksi.php";
$KodeObat = $_POST['KodeObat'];
$NamaObat = $_POST['NamaObat'];
$JenisObat = $_POST['JenisObat'];
$Kategori = $_POST['Kategori'];
$HargaObat = $_POST['HargaObat'];
$StokObat = $_POST['StokObat'];

$updateObat = "UPDATE obat set KodeObat='$KodeObat' , NamaObat='$NamaObat', JenisObat='$JenisObat' , Kategori='$Kategori' , HargaObat='$HargaObat' , StokObat='$StokObat' where KodeObat='$KodeObat'";

$updateObat_query = mysqli_query($connect,$updateObat);

if ($updateObat_query)
{
	header('location:../../../../halaman_utama.php?tabel_obat=$tabel_obat');
}
else
{
	echo "Update gagal dijalankan";
}

?>