	<?php
	include "koneksi.php";

	$informasi = $_SESSION['IdUser'];

	$tampilkan_isi = "select * from useradmin where IdUser='$informasi'  ";

	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array($connect, $tampilkan_isi_sql)) {
		$IdUser = $isi['IdUser'];
		$Nama = $isi['Nama'];
		$JenisKelamin = $isi['JenisKelamin'];
		$Alamat = $isi['Alamat'];
		$NoTelp = $isi['NoTelp'];
		$Username = $isi['Username'];
		$Password = $isi['Password'];
	?>
		<br>
		<center>
			<h2>Informasi Akun</h2>
		</center><br><br>
		<hr><br>

		<table border="0" height="400">
			<tr>
				<td><b>ID USER&nbsp;</b></td>
				<td width="20">:</td>
				<td><?php echo $IdUser ?></td>
			</tr>
			<tr>
				<td><b>NAMA&nbsp;</b></td>
				<td width="20">:</td>
				<td><?php echo $Nama ?></td>
			</tr>
			<tr>
				<td><b>JENIS KELAMIN&nbsp;</b></td>
				<td width="20">:</td>
				<td><?php echo $JenisKelamin ?></td>
			</tr>
			<tr>
				<td><b>ALAMAT&nbsp;</b></td>
				<td width="20">:</td>
				<td><?php echo $Alamat ?></td>
			</tr>
			<tr>
				<td><b>NO.TELP&nbsp;</b></td>
				<td width="20">:</td>
				<td><?php echo $NoTelp ?></td>
			</tr>
			<tr>
				<td><b>USERNAME&nbsp;</b></td>
				<td width="20">:</td>
				<td><?php echo $Username ?></td>
			</tr>
			<tr>
				<td><b>PASSWORD&nbsp;</b></td>
				<td width="20">:</td>
				<td><?php echo $Password ?></td>
			</tr>
			<form action="halaman_utama.php?aksi_login=$aksi_login" method="post">
				<input type="hidden" name="IdUser" value="<?php echo $IdUser; ?>">
				<tr>

					<td><input class="update" name="proses" type="submit" value="Update"></td>
				</tr>
			</form>
		<?php
	}
		?>
		</table>