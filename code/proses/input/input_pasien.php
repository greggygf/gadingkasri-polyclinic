<?php
include "../../../koneksi.php";
$KodePasien = $_POST['KodePasien'];
$NamaPasien = $_POST['NamaPasien'];
$AlamatPasien = $_POST['AlamatPasien'];
$GenderPasien = $_POST['GenderPasien'];
$UmurPasien = $_POST['UmurPasien'];
$TeleponPasien = $_POST['TeleponPasien'];

$insertPasien = "INSERT INTO pasien values ('$KodePasien','$NamaPasien','$AlamatPasien','$GenderPasien','$UmurPasien','$TeleponPasien')";

$insertPasien_query = mysqli_query($connect,$insertPasien);

if ($insertPasien_query)
{
	header('location:../../../halaman_utama.php?tabel_pasien=$tabel_pasien');
}
else
{
	echo "Insert gagal dijalankan";
}

?>