<b>
	<font color="#00b994">DETAIL</font>
</b>
<br><br>
<hr color="#00b994" size="2px" width="100%">
<br>

<form action="halaman_utama.php?tabel_detail=$tabel_detail" method="post">
	<table width="100%">
		<tr>
			<td>
				<a href="halaman_utama.php?formulir_detail=$formulir_detail"><input class="button" type="button" value="Tambah"></a>
				<a href="pdf_detail.php" target="_blank"><input class="button" type="button" value="Print"></a>
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
				<font face="Calibri" size="2"><u>Harap gunakan <b>Nomor Resep</b> dalam pencarian Detail</u>!</font>
			</td>
	</table>
</form>

<br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">No.Resep</th>
		<th class="normal">Nama Obat</th>
		<th class="normal">Dosis</th>
		<th class="normal">Jumlah Obat</th>
		<th class="normal">Subtotal</th>
		<th class="normal">Tools</th>
	</tr>
	<?php
	include "koneksi.php";

	$tampilkan_isi = "select d.NomorResep,o.KodeObat,o.NamaObat,d.Dosis,d.Jumlah,d.SubTotal from detail d,obat o
where d.KodeObat=o.KodeObat";

	if (isset($_POST['cari']) and $_POST['cari'] <> "") {
		$key = $_POST['cari'];
		$tampilkan_isi = "select d.NomorResep,o.KodeObat,o.NamaObat,d.Dosis,d.Jumlah,d.SubTotal from detail d,obat o
where d.KodeObat=o.KodeObat and d.NomorResep LIKE '%$key%' ";

		echo "<font size='3' face='Calibri'>Pencarian data detail dengan nomor resep '$key'</font>";
	} else if (isset($_POST['cari']) and $_POST['cari'] == "") {
		$tampilkan_isi = "select d.NomorResep,o.KodeObat,o.NamaObat,d.Dosis,d.Jumlah,d.SubTotal from detail d,obat o
where d.KodeObat=o.KodeObat";
	}

	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
		$NomorResep = $isi['NomorResep'];
		$KodeObat = $isi['KodeObat'];
		$NamaObat = $isi['NamaObat'];
		$Dosis = $isi['Dosis'];
		$Jumlah = $isi['Jumlah'];
		$SubTotal = $isi['SubTotal'];

	?>
		<tr class="isi" align='left'>
			<td><?php echo $NomorResep ?></td>
			<td><?php echo $NamaObat ?></td>
			<td><?php echo $Dosis ?></td>
			<td><?php echo $Jumlah ?></td>
			<td>Rp.<b><?php echo $SubTotal ?></b></td>
			<td>
				<form action="halaman_utama.php?aksi_detail=$aksi_detail" method="post">
					<input type="hidden" name="NomorResep" value="<?php echo $NomorResep; ?>">
					<input type="hidden" name="KodeObat" value="<?php echo $KodeObat; ?>">
					<input type="hidden" name="Dosis" value="<?php echo $Dosis; ?>">
					<input type="hidden" name="Jumlah" value="<?php echo $Jumlah; ?>">
					<input type="hidden" name="SubTotal" value="<?php echo $SubTotal; ?>">

					<input class="update" name="proses" type="submit" value="Update">
					<input class="delete" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data detail bernomor resep <?php echo $NomorResep; ?> ?')">
			</td>
			</td>
		</tr>
		</form>
	<?php
	}
	?>
</table>