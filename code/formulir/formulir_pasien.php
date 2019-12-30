<br>
<center>
    <h2>Tambah Data Pasien</h2>
</center><br><br>
<hr><br>

<form action="code/proses/input/input_pasien.php" method="POST">

    <table id="tabel-pendaftaran">
        <tr>
            <td><b>Kode Pasien</b></td>
        </tr>

        <tr>
            <td>

                <?php include "koneksi.php";
                $tampilkan_isi = "select count(KodePasien) as jumlah from pasien;";
                $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
                $no = 1;

                while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                    $jumlah = $isi['jumlah'];
                ?>

                    <input type="text" name='KodePasien' size="25px" maxlength="11" style="background-color:#E0DFDF" value="<?php echo $no + $jumlah ?>" readonly>

            </td>
        </tr>
    <?php
                } ?>

    <tr>
        <td><b>Nama Pasien</b></td>
    </tr>

    <tr>
        <td><input type="text" name="NamaPasien" size="25px" maxlength="40" placeholder="ketikkan nama pasien.." required></td>
    </tr>

    <tr>
        <td><b>Alamat</b></td>
    </tr>

    <tr>
        <td><textarea name="AlamatPasien" cols="28" rows="5" maxlength="50" placeholder="ketikkan alamat pasien.." required></textarea>
        </td>
    </tr>

    <tr>
        <td><b>Jenis Kelamin</b></td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="GenderPasien" value="P" required>&nbsp;Perempuan&nbsp;&nbsp;
            <input type="radio" name="GenderPasien" value="L">&nbsp;Laki-Laki</td>
    </tr>

    <tr>
        <td><b>Umur</b></td>
    </tr>

    <tr>
        <td><input type="text" name="UmurPasien" size="25px" maxlength="4" placeholder="ketikkan umur.." required></td>
    </tr>

    <tr>
        <td><b>Telepon</b></td>
    </tr>

    <tr>
        <td><input type="text" name="TeleponPasien" size="25px" maxlength="13" placeholder="ketikkan nomor telepon.." required>&nbsp;&nbsp;&nbsp; <input class="button" type="submit" value="Simpan"></td>
    </tr>



    </table>

</form>