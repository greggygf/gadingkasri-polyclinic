<body>
    <?php
    include "koneksi.php";
    $aksi = strtolower($_POST['proses']);
    $KodeObat = $_POST['KodeObat'];


    if ($aksi == "delete") {
        $delete_obat = "DELETE from obat where KodeObat='$KodeObat'";

        $delete_obat_query = mysqli_query($connect, $delete_obat);

        if ($delete_obat_query) {
            header("location:halaman_utama.php?tabel_obat=$tabel_obat");
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        include "koneksi.php";

        $query = mysqli_query($connect, "select * from obat where KodeObat='$KodeObat'");
    ?>

        <br>
        <center>
            <h2>Update Data Obat</h2>
        </center><br><br>
        <hr><br>

        <form action="code/proses/update-delete/update/update_obat.php" method="POST">

            <table id="tabel-pendaftaran">
                <?php
                while ($isi = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><b>Kode Obat</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name='KodeObat' size="25px" maxlength="5" style="background-color:#E0DFDF" value="<?php echo $KodeObat; ?>" readonly></td>
                    </tr>

                    <tr>
                        <td><b>Nama Obat</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="NamaObat" size="25px" maxlength="40" placeholder="ketikkan nama obat..." value="<?php echo $isi['NamaObat']; ?>" required></td>
                    </tr>

                    <tr>
                        <td><b>Jenis Obat</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="JenisObat" size="25px" maxlength="30" placeholder="ketikkan jenis obat..." value="<?php echo $isi['JenisObat']; ?>" required></td>
                    </tr>

                    <tr>
                        <td><b>Kategori Obat</b></td>
                    </tr>
                    <tr>
                        <td>
                            <select name="Kategori">
                                <option value="" disabled selected>Pilih Kategori</option>
                                <?php if ($isi['Kategori'] == "Bebas") { ?>
                                    <option value="Bebas" selected>Bebas</option>
                                    <option value="Keras">Keras</option>
                                    <option value="Psikotropika">Psikotropika</option>
                                <?php
                                } else if ($isi['Kategori'] == "Keras") { ?>
                                    <option value="Bebas">Bebas</option>
                                    <option value="Keras" selected>Keras</option>
                                    <option value="Psikotropika">Psikotropika</option>
                                <?php
                                } else { ?>
                                    <option value="Bebas">Bebas</option>
                                    <option value="Keras">Keras</option>
                                    <option value="Psikotropika" selected>Psikotropika</option>
                                <?php
                                } ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><b>Harga</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name='HargaObat' size="25px" maxlength="15" value="<?php echo $isi['HargaObat']; ?>"></td>
                    </tr>

                    <tr>
                        <td><b>Stok</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name='StokObat' size="25px" maxlength="7" value="<?php echo $isi['StokObat']; ?>">&nbsp;&nbsp;&nbsp; <input class="button" type="submit" value="Update"></td>
                    </tr>

                <?php } ?>
            </table>
        <?php
    }
        ?>