<br>
<center>
    <h2>Tambah Data Obat</h2>
</center><br><br>
<hr><br>

<form action="code/proses/input/input_obat.php" method="POST">

    <table id="tabel-pendaftaran">
        <tr>
            <td><b>Kode Obat</b></td>
        </tr>

        <tr>
            <td>

                <?php include "koneksi.php";
                $tampilkan_isi = "select count(KodeObat) as jumlah from obat;";
                $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
                $no = 1;

                while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                    $jumlah = $isi['jumlah'];
                ?>

                    <input type="text" name='KodeObat' size="25px" maxlength="5" style="background-color:#E0DFDF" value="O-<?php echo $no + $jumlah ?>" readonly>

            </td>
        </tr>
    <?php
                } ?>

    <tr>
        <td><b>Nama Obat</b></td>
    </tr>

    <tr>
        <td><input type="text" name="NamaObat" size="25px" maxlength="40" placeholder="ketikkan nama obat.." required></td>
    </tr>

    <tr>
        <td><b>Jenis Obat</b></td>
    </tr>

    <tr>
        <td><input type="text" name="JenisObat" size="25px" maxlength="30" placeholder="ketikkan jenis obat.." required></td>
    </tr>

    <tr>
        <td><b>Kategori Obat</b></td>
    </tr>

    <tr>
        <td>
            <select name="Kategori" required>
                <option value="" disabled selected>Pilih Kategori</option>
                <option value="Bebas">Bebas</option>
                <option value="Keras">Keras</option>
                <option value="Psikotropika">Psikotropika</option>
            </select>
        </td>
    </tr>

    <tr>
        <td><b>Harga Obat</b></td>
    </tr>

    <tr>
        <td><input type="text" name="HargaObat" size="25px" maxlength="10" placeholder="ketikkan harga obat.." required></td>
    </tr>

    <tr>
        <td><b>Stok</b></td>
    </tr>

    <tr>
        <td><input type="text" name="StokObat" size="25px" maxlength="7" placeholder="ketikkan stok obat saat ini.." required>&nbsp;&nbsp;&nbsp; <input class="button" type="submit" value="Simpan"></td>
    </tr>



    </table>

</form>