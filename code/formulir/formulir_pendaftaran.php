<br>
<center>
	<h2>Tambah Data Pendaftaran</h2>
</center><br><br>
<hr><br>

<form action="code/proses/input/input_pendaftaran.php" method="POST">

	<table id="tabel-pendaftaran">
		<tr>
			<td><b>No.Pendaftaran</b></td>
		</tr>

		<tr>
			<td>

				<?php include "koneksi.php";
				$tampilkan_isi = "select count(NoDaftar) as jumlah from pendaftaran;";
				$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
				$no = 1;

				while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
					$jumlah = $isi['jumlah'];
				?>

					<input type="text" name='NoDaftar' size="25px" maxlength="11" style="background-color:#E0DFDF" value="<?php echo $no + $jumlah ?>" readonly>

			</td>
		</tr>
	<?php
				} ?>

	<tr>
		<td><b>Pasien</b></td>
	</tr>

	<tr>
		<td>

			<select name="KodePasien" required>
				<option value="" disabled selected>Pilih Pasien</option>

				<?php include "koneksi.php";
				$tampilkan_isi = "select * from `pasien`";
				$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

				while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
					$KodePasien = $isi['KodePasien'];
					$NamaPasien = $isi['NamaPasien'];
				?>
					<option value="<?php echo $KodePasien ?>"><?php echo $KodePasien ?> | <?php echo $NamaPasien ?>
					<?php
				}
					?>
					</option>
		</td>
	</tr>

	<tr>
		<td><b>Dokter</b></td>
	</tr>

	<tr>
		<td>

			<select name="KodeDokter" required>
				<option value="" disabled selected>Pilih Dokter</option>

				<?php include "koneksi.php";
				$tampilkan_isi = "select * from `dokter`";
				$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

				while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
					$KodeDokter = $isi['KodeDokter'];
					$NamaDokter = $isi['NamaDokter'];
				?>
					<option value="<?php echo $KodeDokter ?>"><?php echo $KodeDokter ?> | <?php echo $NamaDokter ?>
					<?php
				}
					?>
					</option>
					<input class="button" type="submit" value="Simpan"></td>
	</tr>

	</table>

</form>