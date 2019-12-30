<b>
	<font color="#00b994">OBAT</font>
</b>
<br><br>
<hr color="#00b994" size="2px" width="100%">
<br>

<form action="halaman_utama.php?tabel_obat=$tabel_obat" method="post">
	<table width="100%">
		<tr>
			<td>
				<?php
				if ($_SESSION['Level'] == "Superadmin" or $_SESSION['Level'] == "Admin") {
				?>
					<a href="halaman_utama.php?formulir_obat=$formulir_obat"><input class="button" type="button" value="Tambah"></a>
				<?php } ?>
				<a href="pdf_obat.php" target="_blank"><input class="button" type="button" value="Print"></a>
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
				<font face="Calibri" size="2"><u>Harap gunakan <b>Nama Obat</b> dalam pencarian Obat</u>!</font>
			</td>
	</table>
</form>

<br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">Kode Obat</th>
		<th class="normal">Nama Obat</th>
		<th class="normal">Jenis Obat</th>
		<th class="normal">Kategori</th>
		<th class="normal">Harga Obat</th>
		<th class="normal">Stok</th>
		<?php
		if ($_SESSION['Level'] == "Superadmin" or $_SESSION['Level'] == "Admin") {
		?>
			<th class="normal">Tools</th>
		<?php } ?>
	</tr>
	<?php
	include "koneksi.php";

	$tampilkan_isi = "select * from obat";

	if (isset($_POST['cari']) and $_POST['cari'] <> "") {
		$key = $_POST['cari'];
		$tampilkan_isi = "select * from obat where NamaObat LIKE '%$key%' ";

		echo "<font size='3' face='Calibri'>Pencarian data obat dengan kata '$key'</font>";
	} else if (isset($_POST['cari']) and $_POST['cari'] == "") {
		$tampilkan_isi = "select * from obat";
	}

	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
		$KodeObat = $isi['KodeObat'];
		$NamaObat = $isi['NamaObat'];
		$JenisObat = $isi['JenisObat'];
		$Kategori = $isi['Kategori'];
		$HargaObat = $isi['HargaObat'];
		$StokObat = $isi['StokObat'];

	?>
		<tr class="isi" align='left'>
			<td><?php echo $KodeObat ?></td>
			<td><?php echo $NamaObat ?></td>
			<td><?php echo $JenisObat ?></td>
			<td><?php echo $Kategori ?></td>
			<td>Rp.<b><?php echo $HargaObat ?></b></td>
			<td><?php echo $StokObat ?></td>
			<?php
			if ($_SESSION['Level'] == "Superadmin" or $_SESSION['Level'] == "Admin") {
			?>
				<td>
					<form action="halaman_utama.php?aksi_obat=$aksi_obat" method="post">
						<input type="hidden" name="KodeObat" value="<?php echo $KodeObat; ?>">
						<input class="update" name="proses" type="submit" value="Update">
						<input class="delete" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data obat <?php echo $NamaObat; ?> ?')">
				</td>
			<?php } ?>
		</tr>
		</form>
	<?php
	}
	?>
</table>