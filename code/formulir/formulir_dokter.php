<br>
<center>
    <h2>Tambah Data Dokter</h2>
</center><br><br>
<hr><br>

<form action="code/proses/input/input_dokter.php" method="POST">

    <table id="tabel-pendaftaran">
        <tr>
            <td><b>Kode Dokter</b></td>
        </tr>

        <tr>
            <td>

                <?php include "koneksi.php";
                $tampilkan_isi = "select count(KodeDokter) as jumlah from dokter;";
                $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
                $no = 1;

                while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                    $jumlah = $isi['jumlah'];
                ?>

                    <input type="text" name='KodeDokter' size="25px" maxlength="5" style="background-color:#E0DFDF" value="DO-<?php echo $no + $jumlah ?>" readonly>

            </td>
        </tr>
    <?php
                } ?>

    <tr>
        <td><b>Nama Dokter</b></td>
    </tr>

    <tr>
        <td><input type="text" name="NamaDokter" size="25px" maxlength="40" placeholder="ketikkan nama dokter.." required></td>
    </tr>

    <tr>
        <td><b>Spesialis</b></td>
    </tr>

    <tr>
        <td><input type="text" name="Spesialis" size="25px" maxlength="30" placeholder="ketikkan spesialis.." required></td>
    </tr>

    <tr>
        <td><b>Poli</b></td>
    </tr>

    <tr>
        <td>

            <select name="KodePoli" required>
                <option value="" disabled selected>Pilih Poliklinik</option>

                <?php include "koneksi.php";
                $tampilkan_isi = "select * from `poli`";
                $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

                while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                    $KodePoli = $isi['KodePoli'];
                    $NamaPoli = $isi['NamaPoli'];
                ?>
                    <option value="<?php echo $KodePoli ?>"><?php echo $KodePoli ?> | <?php echo $NamaPoli ?>
                    <?php
                }
                    ?>
                    </option>
        </td>
    </tr>

    <tr>
        <td><b>Alamat</b></td>
    </tr>

    <tr>
        <td><textarea name="AlamatDokter" cols="28" rows="5" maxlength="50" placeholder="ketikkan alamat dokter.." required></textarea>
        </td>
    </tr>

    <tr>
        <td><b>Telepon</b></td>
    </tr>

    <tr>
        <td><input type="text" name="TeleponDokter" size="25px" maxlength="13" placeholder="ketikkan nomor telepon.." required></td>
    </tr>

    <tr>
        <td><b>Tarif</b></td>
    </tr>

    <tr>
        <td><input type="text" name="Tarif" size="25px" maxlength="10" placeholder="ketikkan tarif.." required>&nbsp;&nbsp;&nbsp; <input class="button" type="submit" value="Simpan"></td>
    </tr>



    </table>

</form>