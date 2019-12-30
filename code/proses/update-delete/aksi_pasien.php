<body>
    <?php
    include "koneksi.php";
    $aksi = strtolower($_POST['proses']);
    $KodePasien = $_POST['KodePasien'];


    if ($aksi == "delete") {
        $delete_pasien = "DELETE from pasien where KodePasien='$KodePasien'";

        $delete_pasien_query = mysqli_query($connect, $delete_pasien);

        if ($delete_pasien_query) {
            header("location:halaman_utama.php?tabel_pasien=$tabel_pasien");
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        include "koneksi.php";

        $query = mysqli_query($connect, "select * from pasien where KodePasien='$KodePasien'");
    ?>

        <br>
        <center>
            <h2>Update Data Pasien</h2>
        </center><br><br>
        <hr><br>

        <form action="code/proses/update-delete/update/update_pasien.php" method="POST">

            <table id="tabel-pendaftaran">
                <?php
                while ($isi = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><b>Kode Pasien</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name='KodePasien' size="25px" maxlength="5" style="background-color:#E0DFDF" value="<?php echo $KodePasien; ?>" readonly></td>
                    </tr>

                    <tr>
                        <td><b>Nama Pasien</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="NamaPasien" size="25px" maxlength="40" placeholder="ketikkan nama pasien..." value="<?php echo $isi['NamaPasien']; ?>" required></td>
                    </tr>

                    <tr>
                        <td><b>Alamat</b></td>
                    </tr>
                    <tr>
                        <td><textarea name="AlamatPasien" cols="28" rows="5" maxlength="50" placeholder="ketikkan alamat pasien.." required><?php echo $isi['AlamatPasien']; ?></textarea></td>
                    </tr>

                    <tr>
                        <td><b>Jenis Kelamin</b></td>
                    </tr>
                    <tr>
                        <td>
                            <?php if ($isi['GenderPasien'] == "P") { ?>
                                <input type="radio" name="GenderPasien" value="P" checked>&nbsp;Perempuan&nbsp;&nbsp;
                                <input type="radio" name="GenderPasien" value="L">&nbsp;Laki-Laki</td>
                    <?php
                            } else { ?>
                        <input type="radio" name="GenderPasien" value="P">&nbsp;Perempuan&nbsp;&nbsp;
                        <input type="radio" name="GenderPasien" value="L" checked>&nbsp;Laki-Laki</td>
                    <?php
                            } ?>
                    </tr>

                    <tr>
                        <td><b>Umur</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name='UmurPasien' size="25px" maxlength="4" value="<?php echo $isi['UmurPasien']; ?>"></td>
                    </tr>

                    <tr>
                        <td><b>Telepon</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name='TeleponPasien' size="25px" maxlength="13" value="<?php echo $isi['TeleponPasien']; ?>">&nbsp;&nbsp;&nbsp; <input class="button" type="submit" value="Update"></td>
                    </tr>

                <?php } ?>
            </table>
        <?php
    }
        ?>