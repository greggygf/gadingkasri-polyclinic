<b>
	<font color="#00b994">ACCOUNT</font>
</b>
<br><br>
<hr color="#00b994" size="2px" width="100%">
<br>

<form action="halaman_utama.php?tabel_login=$tabel_login" method="post">
	<table width="100%">
		<tr>
			<td>
				<a href="halaman_utama.php?formulir_login=$formulir_login"><input class="button" type="button" value="Tambah"></a>
				<a href="code/pdf/pdf_login.php" target="_blank"><input class="button" type="button" value="Print"></a>
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
				<font face="Calibri" size="2"><u>Harap gunakan <b>Nama</b> dalam pencarian Account</u>!</font>
			</td>
	</table>
</form>

<br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">ID User</th>
		<th class="normal">Nama</th>
		<th class="normal">Jenis Kelamin</th>
		<th class="normal">Alamat</th>
		<th class="normal">Telepon</th>
		<th class="normal">Username</th>
		<th class="normal">Password</th>
		<th class="normal">Level User</th>
		<th class="normal">Tools</th>
	</tr>
	<?php
	include "koneksi.php";

	$tampilkan_isi = "select * from useradmin";

	if (isset($_POST['cari']) and $_POST['cari'] <> "") {
		$key = $_POST['cari'];
		$tampilkan_isi = "select * from useradmin where Nama LIKE '%$key%' ";

		echo "<font size='3' face='Calibri'>Pencarian data account dengan kata '$key'</font>";
	} else if (isset($_POST['cari']) and $_POST['cari'] == "") {
		$tampilkan_isi = "select * from useradmin";
	}

	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
		$IdUser = $isi['IdUser'];
		$Nama = $isi['Nama'];
		$JenisKelamin = $isi['JenisKelamin'];
		$Alamat = $isi['Alamat'];
		$NoTelp = $isi['NoTelp'];
		$Username = $isi['Username'];
		$Password = $isi['Password'];
		$Level = $isi['Level'];

	?>
		<tr class="isi" align='left'>
			<td><?php echo $IdUser ?></td>
			<td><?php echo $Nama ?></td>
			<td><?php
				if ($JenisKelamin == "L") {
					echo "Laki-Laki";
				} else {
					echo "Perempuan";
				}
				?></td>
			<td><?php echo $Alamat ?></td>
			<td><?php echo $NoTelp ?></td>
			<td><?php echo $Username ?></td>
			<td><?php echo $Password ?></td>
			<td><?php echo $Level ?></td>
			<td>
				<form action="halaman_utama.php?aksi_login=$aksi_login" method="post">
					<input type="hidden" name="IdUser" value="<?php echo $IdUser; ?>">
					<input class="update" name="proses" type="submit" value="Update">
					<input class="delete" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data account bernama <?php echo $Nama; ?> ?')">
			</td>
			</td>
		</tr>
		</form>
	<?php
	}
	?>
</table>