<b>
	<font color="#00b994">DOKTER</font>
</b>
<br><br>
<hr color="#00b994" size="2px" width="100%">
<br>

<form action="halaman_utama.php?tabel_dokter=$tabel_dokter" method="post">
	<table width="100%">
		<tr>
			<td>
				<?php
				if ($_SESSION['Level'] == "Superadmin") {
				?>
					<a href="halaman_utama.php?formulir_dokter=$formulir_dokter"><input class="button" type="button" value="Tambah"></a>
				<?php } ?>
				<a href="pdf_dokter.php" target="_blank"><input class="button" type="button" value="Print"></a>
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
				<font face="Calibri" size="2"><u>Harap gunakan <b>Nama Dokter</b> dalam pencarian Dokter</u>!</font>
			</td>
	</table>
</form>

<br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">Kode Dokter</th>
		<th class="normal">Nama Dokter</th>
		<th class="normal">Spesialis</th>
		<th class="normal">Alamat</th>
		<th class="normal">Telepon</th>
		<th class="normal">Tarif</th>
		<th class="normal">Poli</th>
		<?php
		if ($_SESSION['Level'] == "Superadmin") {
		?>
			<th class="normal">Tools</th>
		<?php } ?>
	</tr>
	<?php
	include "koneksi.php";

	$tampilkan_isi = "select * from dokter d,poli p where d.KodePoli=p.KodePoli";

	if (isset($_POST['cari']) and $_POST['cari'] <> "") {
		$key = $_POST['cari'];
		$tampilkan_isi = "select * from dokter d,poli p where d.KodePoli=p.KodePoli AND NamaDokter LIKE '%$key%' ";

		echo "<font size='3' face='Calibri'>Pencarian data dokter dengan kata '$key'</font>";
	} else if (isset($_POST['cari']) and $_POST['cari'] == "") {
		$tampilkan_isi = "select * from dokter d,poli p where d.KodePoli=p.KodePoli";
	}

	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
		$KodeDokter = $isi['KodeDokter'];
		$NamaDokter = $isi['NamaDokter'];
		$Spesialis = $isi['Spesialis'];
		$AlamatDokter = $isi['AlamatDokter'];
		$TeleponDokter = $isi['TeleponDokter'];
		$Tarif = $isi['Tarif'];
		$NamaPoli = $isi['NamaPoli'];

	?>
		<tr class="isi" align='left'>
			<td><?php echo $KodeDokter ?></td>
			<td><?php echo $NamaDokter ?></td>
			<td><?php echo $Spesialis ?></td>
			<td><?php echo $AlamatDokter ?></td>
			<td><?php echo $TeleponDokter ?></td>
			<td>Rp.<b><?php echo $Tarif ?></b></td>
			<td><?php echo $NamaPoli ?></td>
			<?php
			if ($_SESSION['Level'] == "Superadmin") {
			?>
				<td>
					<form action="halaman_utama.php?aksi_dokter=$aksi_dokter" method="post">
						<input type="hidden" name="KodeDokter" value="<?php echo $KodeDokter; ?>">
						<input class="update" name="proses" type="submit" value="Update">
						<input class="delete" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data dokter bernama <?php echo $NamaDokter; ?> ?')">
				</td>
			<?php } ?>
		</tr>
		</form>
	<?php
	}
	?>
</table>