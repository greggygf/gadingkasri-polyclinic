<br>
<center>
    <h2>Tambah Data Detail</h2>
</center><br><br>
<hr><br>

<form action="code/proses/input/input_detail.php" method="POST">

    <table id="tabel-pendaftaran">

        <tr>
            <td><b>Nomor Resep</b></td>
        </tr>

        <tr>
            <td>

                <select name="NomorResep" required>
                    <option value="" disabled selected>Pilih Nomor Resep</option>

                    <?php include "koneksi.php";
                    $tampilkan_isi = "select r.NomorResep,p.WaktuDaftar,pa.NamaPasien,d.NamaDokter,d.Tarif
from resep r,pendaftaran p,pasien pa,dokter d
where p.KodePasien=pa.KodePasien and p.KodeDokter=d.KodeDokter and r.NoDaftar=p.NoDaftar;";
                    $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

                    while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                        $NomorResep = $isi['NomorResep'];
                        $WaktuDaftar = $isi['WaktuDaftar'];
                        $NamaPasien = $isi['NamaPasien'];
                        $NamaDokter = $isi['NamaDokter'];
                        $Tarif = $isi['Tarif'];
                    ?>
                        <option value="<?php echo $NomorResep ?>">(<?php echo $NomorResep ?>) | <?php echo $WaktuDaftar ?> | <?php echo $NamaPasien ?>&nbsp;(PASIEN) - <?php echo $NamaDokter ?>
                        <?php
                    }
                        ?>
                        </option>
            </td>
        </tr>

        <tr>
            <td><b>Obat</b></td>
        </tr>

        <tr>
            <td>

                <select name="KodeObat" required>
                    <option value="" disabled selected>Kode Obat</option>
                    <?php
                    include "koneksi.php";
                    $tampilkan_isi2 = "select * from `obat`";
                    $tampilkan_isi_sql2 = mysqli_query($connect, $tampilkan_isi2);

                    while ($isi2 = mysqli_fetch_array($tampilkan_isi_sql2)) {
                        $KodeObat = $isi2['KodeObat'];
                        $NamaObat = $isi2['NamaObat'];
                        $HargaObat = $isi2['HargaObat'];
                    ?>
                        <option value="<?php echo $KodeObat ?>"><?php echo $KodeObat ?> | <?php echo $NamaObat ?> ( Rp.<?php echo $HargaObat ?> )
                        <?php
                    }
                        ?>
                        </option>
            </td>
        </tr>

        <tr>
            <td>
            </td>
        </tr>

        <tr>
            <td><b>Dosis</b></td>
        </tr>

        <tr>
            <td><input type="text" name="Dosis" size="25px" maxlength="20" placeholder="ketikkan dosis.." required></td>
        </tr>

        <tr>
            <td><b>Jumlah Obat</b></td>
        </tr>

        <tr>
            <td><input type="text" name="Jumlah" size="25px" maxlength="6" placeholder="ketikkan jumlah.." required>&nbsp;&nbsp;&nbsp; <input class="button" type="submit" value="Simpan"></td>
        </tr>

    </table>

</form>