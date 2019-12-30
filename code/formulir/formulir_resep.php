<br>
<center>
    <h2>Tambah Data Resep</h2>
</center><br><br>
<hr><br>

<form action="code/proses/input/input_resep.php" method="POST">

    <table id="tabel-pendaftaran">
        <tr>
            <td><b>Nomor Resep</b></td>
        </tr>

        <tr>
            <td>

                <?php include "koneksi.php";
                $tampilkan_isi = "select count(NomorResep) as jumlah from resep;";
                $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
                $no = 1;

                while ($isi = mysqli_fetch_array($connect, $tampilkan_isi_sql)) {
                    $jumlah = $isi['jumlah'];
                ?>

                    <input type="text" name='NomorResep' size="25px" maxlength="5" style="background-color:#E0DFDF" value="<?php echo $no + $jumlah ?>" readonly>

            </td>
        </tr>
    <?php
                } ?>

    <tr>
        <td><b>No.Daftar</b></td>
    </tr>

    <tr>
        <td>

            <select name="NoDaftar" required>
                <option value="" disabled selected>Pilih Pendaftaran</option>

                <?php include "koneksi.php";
                $tampilkan_isi = "select p.NoDaftar,p.WaktuDaftar,pa.NamaPasien,d.NamaDokter from resep r
						  right outer join pendaftaran p
						  ON r.NoDaftar=p.NoDaftar
						  right outer join pasien pa
						  ON p.KodePasien=pa.KodePasien
						  right outer join dokter d
						  ON p.KodeDokter=d.KodeDokter
						  where r.NomorResep is NULL and p.WaktuDaftar is NOT NULL;";
                $tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);

                while ($isi = mysqli_fetch_array($connect,$tampilkan_isi_sql)) {
                    $NoDaftar = $isi['NoDaftar'];
                    $WaktuDaftar = $isi['WaktuDaftar'];
                    $NamaPasien = $isi['NamaPasien'];
                    $NamaDokter = $isi['NamaDokter'];
                ?>
                    <option value="<?php echo $NoDaftar ?>">(<?php echo $NoDaftar ?>) <?php echo $WaktuDaftar ?> | <?php echo $NamaPasien ?> (PASIEN) - <?php echo $NamaDokter ?> (DOKTER)
                    <?php
                }
                    ?>
                    </option>
        </td>
    </tr>


    <tr>
        <td><b>Tanggal Tebus</b></td>
    </tr>

    <tr>
        <td><input type="date" name="TanggalTebus" size="25px" required></td>
    </tr>

    <tr>
        <td><b>Total Harga</b></td>
    </tr>

    <tr>
        <td><input type="text" name="TotalHarga" size="25px" maxlength="10" placeholder="ketikkan total harga.." required></td>
    </tr>

    <tr>
        <td><b>Bayar</b></td>
    </tr>

    <tr>
        <td><input type="text" name="Bayar" size="25px" maxlength="10" placeholder="ketikkan total pembayaran.." required>&nbsp;&nbsp;&nbsp; <input class="button" type="submit" value="Simpan"></td>
    </tr>

    </table>


    </table>

</form>