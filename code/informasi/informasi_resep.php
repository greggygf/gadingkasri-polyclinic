<b>
	<font color="#00b994">RESEP</font>
</b>
<br><br>
<hr color="#00b994" size="2px" width="100%">
<br>

<form action="halaman_utama.php?informasi_resep=$informasi_resep" method="post">
	<table width="100%">
		<tr>
			<td>
				<a href="pdf_resep_untuk_pasien.php" target="_blank"><input class="button" type="button" value="Print"></a>
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
				<font face="Calibri" size="2"><u>Harap gunakan <b>Nomor Resep</b> dalam pencarian Resep</u>!</font>
			</td>
	</table>
</form>

<br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">No.Resep</th>
		<th class="normal">Tanggal/Waktu Pendaftaran</th>
		<th class="normal">Pasien</th>
		<th class="normal">Dokter</th>
		<th class="normal">Tanggal Tebus</th>
		<th class="normal">Total Harga</th>
		<th class="normal">Pembayaran</th>
		<th class="normal">Kembali</th>
		<?php
		if ($_SESSION['Level'] == "Superadmin" or $_SESSION['Level'] == "Admin") {
		?>
			<th class="normal">Tools</th>
		<?php } ?>
	</tr>
	<?php
	include "koneksi.php";
	$informasi = $_SESSION['Nama'];

	$tampilkan_isi = "select r.NomorResep,p.WaktuDaftar,pa.NamaPasien,d.NamaDokter,r.TanggalTebus,r.TotalHarga,r.Bayar,r.Kembali
from resep r,pendaftaran p,pasien pa,dokter d
where p.KodePasien=pa.KodePasien and p.KodeDokter=d.KodeDokter and r.NoDaftar=p.NoDaftar AND pa.NamaPasien='$informasi'";

	if (isset($_POST['cari']) and $_POST['cari'] <> "") {
		$key = $_POST['cari'];
		$tampilkan_isi = "select r.NomorResep,p.WaktuDaftar,pa.NamaPasien,d.NamaDokter,r.TanggalTebus,r.TotalHarga,r.Bayar,r.Kembali
from resep r,pendaftaran p,pasien pa,dokter d
where p.KodePasien=pa.KodePasien and p.KodeDokter=d.KodeDokter and r.NoDaftar=p.NoDaftar AND pa.NamaPasien='$informasi' AND r.NomorResep LIKE '%$key%' ";

		echo "<font size='3' face='Calibri'>Pencarian data resep dengan nomor '$key'</font>";
	} else if (isset($_POST['cari']) and $_POST['cari'] == "") {
		$tampilkan_isi = "select r.NomorResep,p.WaktuDaftar,pa.NamaPasien,d.NamaDokter,r.TanggalTebus,r.TotalHarga,r.Bayar,r.Kembali
from resep r,pendaftaran p,pasien pa,dokter d
where p.KodePasien=pa.KodePasien and p.KodeDokter=d.KodeDokter and r.NoDaftar=p.NoDaftar AND pa.NamaPasien='$informasi'";
	}

	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);

	while ($isi = mysqli_fetch_array($connect,$tampilkan_isi_sql)) {
		$NomorResep = $isi['NomorResep'];
		$WaktuDaftar = $isi['WaktuDaftar'];
		$NamaPasien = $isi['NamaPasien'];
		$NamaDokter = $isi['NamaDokter'];
		$TanggalTebus = $isi['TanggalTebus'];
		$TotalHarga = $isi['TotalHarga'];
		$Bayar = $isi['Bayar'];
		$Kembali = $isi['Kembali'];

	?>
		<tr class="isi" align='left'>
			<td><?php echo $NomorResep ?></td>
			<td><?php echo $WaktuDaftar ?></td>
			<td><?php echo $NamaPasien ?></td>
			<td><?php echo $NamaDokter ?></td>
			<td><?php echo $TanggalTebus ?></td>
			<td>Rp.<b><?php echo $TotalHarga ?></b></td>
			<td>Rp.<b><?php echo $Bayar ?></b></td>
			<td>Rp.<b><?php echo $Kembali ?></b></td>
			<?php
			if ($_SESSION['Level'] != "Pasien") {
			?>
				<?php
				if ($_SESSION['Level'] == "Superadmin" or $_SESSION['Level'] == "Admin") {
				?>
					<td>
						<form action="halaman_utama.php?aksi_resep=$aksi_resep" method="post">
							<input type="hidden" name="NomorResep" value="<?php echo $NomorResep; ?>">
							<input class="update" name="proses" type="submit" value="Update">
							<input class="delete" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data resep bernama <?php echo $NamaPasien; ?> ?')">
					</td>
				<?php } ?>
			<?php } ?>
		</tr>
		</form>
	<?php
	}
	?>
</table>