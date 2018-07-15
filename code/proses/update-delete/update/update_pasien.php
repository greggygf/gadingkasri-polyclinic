<?php
include "../../../../koneksi.php";
$KodePasien = $_POST['KodePasien'];
$NamaPasien = $_POST['NamaPasien'];
$AlamatPasien = $_POST['AlamatPasien'];
$GenderPasien = $_POST['GenderPasien'];
$UmurPasien = $_POST['UmurPasien'];
$TeleponPasien = $_POST['TeleponPasien'];

$updatePasien = "UPDATE pasien set KodePasien='$KodePasien' , NamaPasien='$NamaPasien', AlamatPasien='$AlamatPasien' , GenderPasien='$GenderPasien' , UmurPasien='$UmurPasien' , TeleponPasien='$TeleponPasien' where KodePasien='$KodePasien'";

$updatePasien_query = mysqli_query($connect,$updatePasien);

if ($updatePasien_query)
{
	header('location:../../../../halaman_utama.php?tabel_pasien=$tabel_pasien');
}
else
{
	echo "Update gagal dijalankan";
}

?>