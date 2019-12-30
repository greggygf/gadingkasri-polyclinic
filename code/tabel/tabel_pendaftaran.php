<b>
	<font color="#00b994">PENDAFTARAN</font>
</b>
<br><br>
<hr color="#00b994" size="2px" width="100%">
<br>

<form action="halaman_utama.php?tabel_pendaftaran=$tabel_pendaftaran" method="post">
	<table width="100%">
		<tr>
			<td>
				<a href="halaman_utama.php?formulir_pendaftaran=$formulir_pendaftaran"><input class="button" type="button" value="Tambah"></a>
				<a href="pdf_pendaftaran.php" target="_blank"><input class="button" type="button" value="Print"></a>
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
				<font face="Calibri" size="2"><u>Harap gunakan <b>Nomor Pendaftaran</b> dalam pencarian Pendaftaran</u>!</font>
			</td>
	</table>
</form>

<br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">No.Daftar</th>
		<th class="normal">Waktu Daftar</th>
		<th class="normal">Pasien</th>
		<th class="normal">Dokter</th>
		<th class="normal">Tools</th>
	</tr>
	<?php
	include "koneksi.php";

	$tampilkan_isi = "select pd.NoDaftar,pd.WaktuDaftar,p.NamaPasien,d.NamaDokter from pendaftaran pd,pasien p,dokter d where p.KodePasien=pd.KodePasien and pd.KodeDokter=d.KodeDokter order by pd.NoDaftar";

	if (isset($_POST['cari']) and $_POST['cari'] <> "") {
		$key = $_POST['cari'];
		$tampilkan_isi = "select pd.NoDaftar,pd.WaktuDaftar,p.NamaPasien,d.NamaDokter from pendaftaran pd,pasien p,dokter d where p.KodePasien=pd.KodePasien and pd.KodeDokter=d.KodeDokter AND pd.NoDaftar LIKE '%$key%' order by pd.NoDaftar ";

		echo "<font size='3' face='Calibri'>Pencarian data pendaftaran dengan nomor '$key'</font>";
	} else if (isset($_POST['cari']) and $_POST['cari'] == "") {
		$tampilkan_isi = "select pd.NoDaftar,pd.WaktuDaftar,p.NamaPasien,d.NamaDokter from pendaftaran pd,pasien p,dokter d where p.KodePasien=pd.KodePasien and pd.KodeDokter=d.KodeDokter order by pd.NoDaftar";
	}

	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
		$NoDaftar = $isi['NoDaftar'];
		$WaktuDaftar = $isi['WaktuDaftar'];
		$NamaPasien = $isi['NamaPasien'];
		$NamaDokter = $isi['NamaDokter'];

	?>
		<tr class="isi" align='left'>
			<td><?php echo $NoDaftar ?></td>
			<td><?php echo $WaktuDaftar ?></td>
			<td><?php echo $NamaPasien ?></td>
			<td><?php echo $NamaDokter ?></td>
			<td>
				<form action="aksi_pendaftaran.php" method="post">
					<input type="hidden" name="NoDaftar" value="<?php echo $NoDaftar; ?>">
					<input class="delete" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data pendaftaran bernama <?php echo $NamaPasien; ?> ?')">
			</td>
		</tr>
		</form>
	<?php
	}
	?>
</table>