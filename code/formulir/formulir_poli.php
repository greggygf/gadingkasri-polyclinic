<br>
<center>
    <h2>Tambah Data Poli</h2>
</center><br><br>
<hr><br>

<form action="code/proses/input/input_poli.php" method="POST">

    <table id="tabel-pendaftaran">
        <tr>
            <td><b>Kode Poli</b></td>
        </tr>

        <tr>
            <td>

                <?php include "koneksi.php";
                $tampilkan_isi = "select count(KodePoli) as jumlah from poli;";
                $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
                $no = 1;

                while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                    $jumlah = $isi['jumlah'];
                ?>

                    <input type="text" name='KodePoli' size="25px" maxlength="5" style="background-color:#E0DFDF" value="PO-<?php echo $no + $jumlah ?>" readonly>

            </td>
        </tr>
    <?php
                } ?>

    <tr>
        <td><b>Nama Poli</b></td>
    </tr>

    <tr>
        <td><input type="text" name="NamaPoli" size="25px" maxlength="30" placeholder="ketikkan nama.." required>&nbsp;&nbsp;&nbsp; <input class="button" type="submit" value="Simpan"></td>
    </tr>


    </table>

</form>