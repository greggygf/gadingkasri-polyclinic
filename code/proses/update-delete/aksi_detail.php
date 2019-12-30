<body>
    <?php
    include "koneksi.php";
    $aksi = strtolower($_POST['proses']);
    $NomorResep = $_POST['NomorResep'];
    $KodeObat = $_POST['KodeObat'];
    $Dosis = $_POST['Dosis'];
    $Jumlah = $_POST['Jumlah'];
    $SubTotal = $_POST['SubTotal'];


    if ($aksi == "delete") {
        $delete_detail = "DELETE from detail where NomorResep='$NomorResep' and KodeObat='$KodeObat' and Dosis='$Dosis' and Jumlah='$Jumlah' and SubTotal='$SubTotal'";

        $delete_detail_query = mysqli_query($connect, $delete_detail);

        if ($delete_detail_query) {
            header("location:halaman_utama.php?tabel_detail=$tabel_detail");
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        include "koneksi.php";

        $query = mysqli_query($connect, "select r.NomorResep,p.WaktuDaftar,pa.NamaPasien,d.NamaDokter,o.KodeObat,o.NamaObat,o.HargaObat,Dosis,Jumlah,d.Tarif
from resep r,pendaftaran p,pasien pa,dokter d,obat o,detail dt
where r.NomorResep=dt.NomorResep and p.KodePasien=pa.KodePasien and p.KodeDokter=d.KodeDokter and r.NoDaftar=p.NoDaftar
and dt.KodeObat=o.KodeObat and SubTotal='$SubTotal' and Jumlah='$Jumlah' and Dosis='$Dosis' and dt.KodeObat='$KodeObat'");
    ?>

        <br>
        <center>
            <h2>Update Data Detail</h2>
        </center><br><br>
        <hr><br>

        <form action="code/proses/update-delete/update/update_detail.php" method="POST">

            <table id="tabel-pendaftaran">
                <?php
                while ($isi = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><b>Nomor Resep</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="NomorResep" size="25px" maxlength="40" style="background-color:#E0DFDF" value="(<?php echo $isi['NomorResep'] ?>) <?php echo $isi['WaktuDaftar'] ?> | <?php echo $isi['NamaPasien'] ?> (PASIEN) - <?php echo $isi['NamaDokter'] ?> (DOKTER)" readonly></td>
                        <input type="hidden" name="NomorResep" value="<?php echo $NomorResep; ?>">
                        <input type="hidden" name="Tarif" value="<?php echo $isi['Tarif']; ?>">
                    </tr>

                    <tr>
                        <td><b>Obat</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="KodeObat" size="25px" maxlength="40" style="background-color:#E0DFDF" value="<?php echo $isi['KodeObat'] ?> | <?php echo $isi['NamaObat'] ?> ( Rp.<?php echo $isi['HargaObat'] ?> )" readonly></td>
                        <input type="hidden" name="HargaObat" value="<?php echo $isi['HargaObat'] ?>">
                        <input type="hidden" name="KodeObat" value="<?php echo $isi['KodeObat'] ?>">
                    </tr>

                    <tr>
                        <td><b>Dosis</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="Dosis" size="25px" maxlength="30" placeholder="ketikkan dosis obat..." value="<?php echo $isi['Dosis']; ?>" required></td>
                    </tr>

                    <tr>
                        <td><b>Jumlah Obat</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name='Jumlah' size="25px" maxlength="7" value="<?php echo $isi['Jumlah']; ?>">&nbsp;&nbsp;&nbsp; <input class="button" type="submit" value="Update"></td>
                    </tr>

                <?php } ?>
            </table>
        <?php
    }
        ?>