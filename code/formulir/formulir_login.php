<br>
<center>
    <h2>Tambah Data User</h2>
</center><br><br>
<hr><br>

<form action="code/proses/input/input_login.php" method="POST">

    <table id="tabel-pendaftaran">
        <tr>
            <td><b>ID User</b></td>
        </tr>

        <tr>
            <td>

                <?php include "koneksi.php";
                $tampilkan_isi = "select count(IdUser) as jumlah from useradmin;";
                $tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);
                $no = 1;

                while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                    $jumlah = $isi['jumlah'];
                ?>

                    <input type="text" name='IdUser' size="25px" maxlength="5" style="background-color:#E0DFDF" value="ID-<?php echo $no + $jumlah ?>" readonly>

            </td>
        </tr>
    <?php
                } ?>

    <tr>
        <td><b>Nama Lengkap</b></td>
    </tr>

    <tr>
        <td><input type="text" name="Nama" size="25px" maxlength="30" placeholder="ketikkan nama.." required></td>
    </tr>

    <tr>
        <td><b>Jenis Kelamin</b></td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="JenisKelamin" value="P" required>&nbsp;Perempuan&nbsp;&nbsp;
            <input type="radio" name="JenisKelamin" value="L">&nbsp;Laki-Laki</td>
    </tr>

    <tr>
        <td><b>Alamat</b></td>
    </tr>

    <tr>
        <td><textarea name="Alamat" cols="28" rows="5" maxlength="50" placeholder="ketikkan alamat pasien.." required></textarea>
        </td>
    </tr>

    <tr>
        <td><b>Telepon</b></td>
    </tr>

    <tr>
        <td><input type="text" name="NoTelp" size="25px" maxlength="13" placeholder="ketikkan nomor telepon.." required></td>
    </tr>

    <tr>
        <td><b>Username</b></td>
    </tr>

    <tr>
        <td><input type="text" name="Username" size="25px" maxlength="20" placeholder="ketikkan username.." required></td>
    </tr>

    <tr>
        <td><b>Password</b></td>
    </tr>

    <tr>
        <td><input type="password" name="Password" size="25px" maxlength="20" placeholder="ketikkan password.." required></td>
    </tr>

    <tr>
        <td><b>Level User</b></td>
    </tr>

    <tr>
        <td>
            <select name="Level" required>
                <option value="" disabled selected>Pilih Level User</option>
                <option value="Superadmin">Super Admin</option>
                <option value="Admin">Admin</option>
                <option value="Dokter">Dokter</option>
                <option value="Pasien">Pasien</option>
            </select>&nbsp;&nbsp;&nbsp; <input class="button" type="submit" value="Simpan">
        </td>
    </tr>


    </table>

</form>