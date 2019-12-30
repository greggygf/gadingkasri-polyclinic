<b>
	<font color="#00b994">PASIEN</font>
</b>
<br><br>
<hr color="#00b994" size="2px" width="100%">
<br>

<form action="halaman_utama.php?tabel_pasien=$tabel_pasien" method="post">
	<table width="100%">
		<tr>
			<td>
				<a href="halaman_utama.php?formulir_pasien=$formulir_pasien"><input class="button" type="button" value="Tambah"></a>
				<a href="pdf_pasien.php" target="_blank"><input class="button" type="button" value="Print"></a>
			</td>
			<td align="right">
				<font size="5px">Search :</font> <input type="search" name="cari" placeholder="" style="
    width: 200px;
    padding: 10px 10px;
    height:40px;
    margin: 5px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	font-family:Calibri;
		font-size:15px;">
			</td>

		</tr>
		<tr>
			<td></td>
			<td align="right">
				<font face="Calibri" size="2"><u>Harap gunakan <b>Nama Pasien</b> dalam pencarian Pasien</u>!</font>
			</td>
	</table>
</form>

<br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">Kode Pasien</th>
		<th class="normal">Nama</th>
		<th class="normal">Alamat</th>
		<th class="normal">Jenis Kelamin</th>
		<th class="normal">Umur</th>
		<th class="normal">Telepon</th>
		<th class="normal">Tools</th>
	</tr>
	<?php
	include "koneksi.php";

	$tampilkan_isi = "select * from pasien";

	if (isset($_POST['cari']) and $_POST['cari'] <> "") {
		$key = $_POST['cari'];
		$tampilkan_isi = "select * from pasien where NamaPasien LIKE '%$key%' ";

		echo "<font size='3' face='Calibri'>Pencarian data pasien dengan kata '$key'</font>";
	} else if (isset($_POST['cari']) and $_POST['cari'] == "") {
		$tampilkan_isi = "select * from pasien";
	}

	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
		$KodePasien = $isi['KodePasien'];
		$NamaPasien = $isi['NamaPasien'];
		$AlamatPasien = $isi['AlamatPasien'];
		$GenderPasien = $isi['GenderPasien'];
		$UmurPasien = $isi['UmurPasien'];
		$TeleponPasien = $isi['TeleponPasien'];

	?>
		<tr class="isi" align='left'>
			<td><?php echo $KodePasien ?></td>
			<td><?php echo $NamaPasien ?></td>
			<td><?php echo $AlamatPasien ?></td>
			<td><?php
				if ($GenderPasien == "L") {
					echo "Laki-Laki";
				} else {
					echo "Perempuan";
				}
				?></td>
			<td><?php echo $UmurPasien ?></td>
			<td><?php echo $TeleponPasien ?></td>
			<td>
				<form action="halaman_utama.php?aksi_pasien=$aksi_pasien" method="post">
					<input type="hidden" name="KodePasien" value="<?php echo $KodePasien; ?>">
					<input class="update" name="proses" type="submit" value="Update">
					<input class="delete" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data pasien bernama <?php echo $NamaPasien; ?> ?')">
			</td>
			</td>
		</tr>
		</form>
	<?php
	}
	?>
</table>