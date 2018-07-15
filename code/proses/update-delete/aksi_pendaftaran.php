<body>
<?php
include "koneksi.php";
$NoDaftar = $_POST['NoDaftar'];

$delete_pendaftaran = "DELETE from pendaftaran where NoDaftar='$NoDaftar'";

	$delete_pendaftaran_query = mysql_query($delete_pendaftaran);

	if ($delete_pendaftaran_query)
	{
		header("location:halaman_utama.php?tabel_pendaftaran=$tabel_pendaftaran");
	}
	else
	{
		echo "Delete gagal dijalankan";
	}