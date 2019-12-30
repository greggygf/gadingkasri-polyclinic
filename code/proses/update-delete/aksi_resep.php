<body>
    <?php
    include "koneksi.php";
    $aksi = strtolower($_POST['proses']);
    $NomorResep = $_POST['NomorResep'];


    if ($aksi == "delete") {
        $delete_resep = "DELETE from resep where NomorResep='$NomorResep'";

        $delete_resep_query = mysqli_query($connect, $delete_resep);

        if ($delete_resep_query) {
            header("location:halaman_utama.php?tabel_resep=$tabel_resep");
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        include "koneksi.php";

        $query = mysqli_query($connect, "select r.NomorResep,p.WaktuDaftar,r.NoDaftar,pa.NamaPasien,d.NamaDokter,r.TanggalTebus,r.TotalHarga,r.Bayar,r.Kembali
from resep r,pendaftaran p,pasien pa,dokter d
where p.KodePasien=pa.KodePasien and p.KodeDokter=d.KodeDokter and r.NoDaftar=p.NoDaftar and r.NomorResep='$NomorResep'");
    ?>

        <br>
        <center>
            <h2>Update Data Resep</h2>
        </center><br><br>
        <hr><br>

        <form action="code/proses/update-delete/update/update_resep.php" method="POST">

            <table id="tabel-pendaftaran">
                <?php
                while ($isi = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><b>Nomor Resep</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name='NomorResep' size="25px" maxlength="5" style="background-color:#E0DFDF" value="<?php echo $NomorResep; ?>" readonly></td>
                    </tr>

                    <tr>
                        <td><b>No.Daftar</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="NoDaftar" size="25px" maxlength="40" style="background-color:#E0DFDF" placeholder="ketikkan nama dokter..." value="(<?php echo $isi['NoDaftar'] ?>) <?php echo $isi['WaktuDaftar'] ?> | <?php echo $isi['NamaPasien'] ?> (PASIEN) - <?php echo $isi['NamaDokter'] ?> (DOKTER)" readonly></td>
                    </tr>

                    <tr>
                        <td><b>Tanggal Tebus</b></td>
                    </tr>

                    <tr>
                        <td><input type="date" name="TanggalTebus" size="25px" value="<?php echo $isi['TanggalTebus'] ?>" required></td>
                    </tr>

                    <tr>
                        <td><b>Total Harga</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name='TotalHarga' size="25px" maxlength="13" style="background-color:#E0DFDF" value="<?php echo $isi['TotalHarga']; ?>" readonly></td>
                    </tr>

                    <tr>
                        <td><b>Bayar</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name='Bayar' size="25px" maxlength="13" value="<?php echo $isi['Bayar']; ?>">&nbsp;&nbsp;&nbsp; <input class="button" type="submit" value="Update"></td>
                    </tr>

                <?php } ?>
            </table>
        <?php
    }
        ?>