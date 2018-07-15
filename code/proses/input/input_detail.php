<?php
include "../../../koneksi.php";
$NomorResep = $_POST['NomorResep'];
$KodeObat = $_POST['KodeObat'];
$HargaObat = $_POST['HargaObat'];
$Dosis = $_POST['Dosis'];
$Jumlah = $_POST['Jumlah'];

$cariharga = "select HargaObat from `obat` where KodeObat='$KodeObat'";
$cariharga_sql = mysqli_query($connect,$cariharga);
	
while ($isi = mysqli_fetch_array($cariharga_sql))
{
	$HargaObat = $isi['HargaObat'];
}

$SubTotal = $HargaObat*$Jumlah;

$insertDetail = "INSERT INTO detail(NomorResep,KodeObat,Dosis,Jumlah,SubTotal) values ('$NomorResep','$KodeObat','$Dosis','$Jumlah','$SubTotal')";

$insertDetail_query = mysqli_query($connect,$insertDetail);

if ($insertDetail_query)
{
	header('location:../../../halaman_utama.php?tabel_detail=$tabel_detail');
}
else
{
	echo "Insert gagal dijalankan";
}

?>