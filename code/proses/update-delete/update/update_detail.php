<?php
include "../../../../koneksi.php";
$NomorResep = $_POST['NomorResep'];
$KodeObat = $_POST['KodeObat'];
$HargaObat = $_POST['HargaObat'];
$Dosis = $_POST['Dosis'];
$Jumlah = $_POST['Jumlah'];
$SubTotal = $HargaObat*$Jumlah;

$updateDetail = "UPDATE detail set Dosis='$Dosis',Jumlah=$Jumlah,SubTotal='$SubTotal' where NomorResep='$NomorResep' and KodeObat='$KodeObat'";

$updateDetail_query = mysqli_query($connect,$updateDetail);

if ($updateDetail_query)
{
	header('location:../../../../halaman_utama.php?tabel_detail=$tabel_detail');
}
else
{
	echo "Insert gagal dijalankan";
}

?>