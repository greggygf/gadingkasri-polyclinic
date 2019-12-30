<body>
    <?php
    include "koneksi.php";
    $aksi = strtolower($_POST['proses']);
    $KodeDokter = $_POST['KodeDokter'];


    if ($aksi == "delete") {
        $delete_dokter = "DELETE from dokter where KodeDokter='$KodeDokter'";

        $delete_dokter_query = mysqli_query($connect, $delete_dokter);

        if ($delete_dokter_query) {
            header("location:halaman_utama.php?tabel_dokter=$tabel_dokter");
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        include "koneksi.php";

        $query = mysqli_query($connect, "select * from dokter d,poli p where KodeDokter='$KodeDokter' and d.KodePoli = p.KodePoli");
    ?>

        <br>
        <center>
            <h2>Update Data Dokter</h2>
        </center><br><br>
        <hr><br>

        <form action="code/proses/update-delete/update/update_dokter.php" method="POST">

            <table id="tabel-pendaftaran">
                <?php
                while ($isi = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><b>Kode Dokter</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name='KodeDokter' size="25px" maxlength="5" style="background-color:#E0DFDF" value="<?php echo $KodeDokter; ?>" readonly></td>
                    </tr>

                    <tr>
                        <td><b>Nama Dokter</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="NamaDokter" size="25px" maxlength="40" placeholder="ketikkan nama dokter..." value="<?php echo $isi['NamaDokter']; ?>" required></td>
                    </tr>

                    <tr>
                        <td><b>Spesialis</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="Spesialis" size="25px" maxlength="30" placeholder="ketikkan spesialis..." value="<?php echo $isi['Spesialis']; ?>" required></td>
                    </tr>

                    <tr>
                        <td><b>Poli</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name='KodePoli' size="25px" maxlength="5" style="background-color:#E0DFDF" value="<?php echo $isi['NamaPoli']; ?>" readonly></td>
                    </tr>

                    <tr>
                        <td><b>Alamat</b></td>
                    </tr>
                    <tr>
                        <td><textarea name="AlamatDokter" cols="28" rows="5" maxlength="50" placeholder="ketikkan alamat dokter.." required><?php echo $isi['AlamatDokter']; ?></textarea></td>
                    </tr>

                    <tr>
                        <td><b>Telepon</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name='TeleponDokter' size="25px" maxlength="13" value="<?php echo $isi['TeleponDokter']; ?>"></td>
                    </tr>

                    <tr>
                        <td><b>Tarif</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name='Tarif' size="25px" maxlength="13" value="<?php echo $isi['Tarif']; ?>">&nbsp;&nbsp;&nbsp; <input class="button" type="submit" value="Update"></td>
                    </tr>

                <?php } ?>
            </table>
        <?php
    }
        ?>