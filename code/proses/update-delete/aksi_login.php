<body>
    <?php
    include "koneksi.php";
    $aksi = strtolower($_POST['proses']);
    $IdUser = $_POST['IdUser'];


    if ($aksi == "delete") {
        $delete_login = "DELETE from useradmin where IdUser='$IdUser'";

        $delete_login_query = mysqli_query($connect, $delete_login);

        if ($delete_login_query) {
            header("location:halaman_utama.php?tabel_login=$tabel_login");
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        include "koneksi.php";

        $query = mysqli_query($connect, "select * from useradmin where IdUser='$IdUser'");
    ?>

        <br>
        <center>
            <h2>Update Data Account</h2>
        </center><br><br>
        <hr><br>

        <form action="code/proses/update-delete/update/update_login.php" method="POST">

            <table id="tabel-pendaftaran">
                <?php
                while ($isi = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><b>ID User</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name='IdUser' size="25px" maxlength="5" style="background-color:#E0DFDF" value="<?php echo $IdUser; ?>" readonly></td>
                    </tr>

                    <tr>
                        <td><b>Nama</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="Nama" size="25px" maxlength="40" placeholder="ketikkan nama..." value="<?php echo $isi['Nama']; ?>" required></td>
                    </tr>

                    <tr>
                        <td><b>Jenis Kelamin</b></td>
                    </tr>
                    <tr>
                        <td>
                            <?php if ($isi['JenisKelamin'] == "P") { ?>
                                <input type="radio" name="JenisKelamin" value="P" checked>&nbsp;Perempuan&nbsp;&nbsp;
                                <input type="radio" name="JenisKelamin" value="L">&nbsp;Laki-Laki</td>
                    <?php
                            } else { ?>
                        <input type="radio" name="JenisKelamin" value="P">&nbsp;Perempuan&nbsp;&nbsp;
                        <input type="radio" name="JenisKelamin" value="L" checked>&nbsp;Laki-Laki</td>
                    <?php
                            } ?>
                    </tr>

                    <tr>
                        <td><b>Alamat</b></td>
                    </tr>
                    <tr>
                        <td><textarea name="Alamat" cols="28" rows="5" maxlength="50" placeholder="ketikkan alamat.." required><?php echo $isi['Alamat']; ?></textarea></td>
                    </tr>

                    <tr>
                        <td><b>Telepon</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name='NoTelp' size="25px" maxlength="13" value="<?php echo $isi['NoTelp']; ?>"></td>
                    </tr>

                    <tr>
                        <td><b>Username</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name='Username' size="25px" maxlength="13" value="<?php echo $isi['Username']; ?>"></td>
                    </tr>

                    <tr>
                        <td><b>Password</b></td>
                    </tr>
                    <tr>
                        <td><input type="password" name='Password' size="25px" maxlength="13" value="<?php echo $isi['Password']; ?>">
                            <?php
                            if ($_SESSION['Level'] != "Superadmin") {
                            ?>
                                &nbsp;&nbsp;&nbsp; <input class="button" type="submit" value="Update">
                            <?php } ?></td>
                    </tr>

                    <?php
                    if ($_SESSION['Level'] == "Superadmin") {
                    ?>
                        <tr>
                            <td><b>Level User</b></td>
                        </tr>
                        <tr>
                            <td>
                                <select name="Level">
                                    <option value="" disabled selected>Pilih Level User</option>
                                    <?php if ($isi['Level'] == "Superadmin") { ?>
                                        <option value="Superadmin" selected>Superadmin</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Dokter">Dokter</option>
                                        <option value="Pasien">Pasien</option>
                                    <?php
                                    } else if ($isi['Level'] == "Admin") { ?>
                                        <option value="Superadmin">Superadmin</option>
                                        <option value="Admin" selected>Admin</option>
                                        <option value="Dokter">Dokter</option>
                                        <option value="Pasien">Pasien</option>
                                    <?php
                                    } else if ($isi['Level'] == "Dokter") { ?>
                                        <option value="Superadmin">Superadmin</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Dokter" selected>Dokter</option>
                                        <option value="Pasien">Pasien</option>
                                    <?php
                                    } else { ?>
                                        <option value="Superadmin">Superadmin</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Dokter">Dokter</option>
                                        <option value="Pasien" selected>Pasien</option>
                                    <?php
                                    } ?>
                                </select>&nbsp;&nbsp;&nbsp; <input class="button" type="submit" value="Update">
                            </td>
                        </tr>

                    <?php } ?>
            </table><?php } ?>
    <?php
    }
    ?>