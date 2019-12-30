<b>
	<font color="#00b994">POLI</font>
</b>
<br><br>
<hr color="#00b994" size="2px" width="100%">
<br>

<form action="halaman_utama.php?tabel_poli=$tabel_poli" method="post">
	<table width="100%">
		<tr>
			<td>
				<?php
				if ($_SESSION['Level'] == "Superadmin" or $_SESSION['Level'] == "Admin") {
				?>
					<a href="halaman_utama.php?formulir_poli=$formulir_poli"><input class="button" type="button" value="Tambah"></a>
				<?php } ?>
				<a href="pdf_poli.php" target="_blank"><input class="button" type="button" value="Print"></a>
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

	</table>
</form>

<br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">Kode Poli</th>
		<th class="normal">Nama Poli</th>
		<?php
		if ($_SESSION['Level'] == "Superadmin" or $_SESSION['Level'] == "Admin") {
		?>
			<th class="normal">Tools</th>
		<?php } ?>
	</tr>
	<?php
	include "koneksi.php";

	$tampilkan_isi = "select * from poli";

	if (isset($_POST['cari']) and $_POST['cari'] <> "") {
		$key = $_POST['cari'];
		$tampilkan_isi = "select * from poli where KodePoli LIKE '%$key%' or NamaPoli LIKE '%$key%'";

		echo "<font size='3' face='Calibri'>Pencarian data poli dengan kata '$key'</font>";
	} else if (isset($_POST['cari']) and $_POST['cari'] == "") {
		$tampilkan_isi = "select * from poli";
	}

	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
		$KodePoli = $isi['KodePoli'];
		$NamaPoli = $isi['NamaPoli'];

	?>
		<tr class="isi" align='left'>
			<td><?php echo $KodePoli ?></td>
			<td><?php echo $NamaPoli ?></td>
			<?php
			if ($_SESSION['Level'] == "Superadmin" or $_SESSION['Level'] == "Admin") {
			?>
				<td>
					<form action="halaman_utama.php?aksi_poli=$aksi_poli" method="post">
						<input type="hidden" name="KodePoli" value="<?php echo $KodePoli; ?>">
						<input class="update" name="proses" type="submit" value="Update">
						<input class="delete" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data poli <?php echo $NamaPoli; ?> ?')">
				</td>
			<?php } ?>
		</tr>
		</form>
	<?php
	}
	?>
</table>