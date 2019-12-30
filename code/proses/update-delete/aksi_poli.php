<body>
    <?php
    include "koneksi.php";
    $aksi = strtolower($_POST['proses']);
    $KodePoli = $_POST['KodePoli'];


    if ($aksi == "delete") {
        $delete_poli = "DELETE from poli where KodePoli='$KodePoli'";

        $delete_poli_query = mysqli_query($connect, $delete_poli);

        if ($delete_poli_query) {
            header("location:halaman_utama.php?tabel_poli=$tabel_poli");
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        include "koneksi.php";

        $query = mysqli_query($connect, "select * from poli where KodePoli='$KodePoli'");
    ?>

        <br>
        <center>
            <h2>Update Data Poli</h2>
        </center><br><br>
        <hr><br>

        <form action="code/proses/update-delete/update/update_poli.php" method="POST">

            <table id="tabel-pendaftaran">
                <?php
                while ($isi = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><b>Kode Poli</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name='KodePoli' size="25px" maxlength="5" style="background-color:#E0DFDF" value="<?php echo $KodePoli; ?>" readonly></td>
                    </tr>

                    <tr>
                        <td><b>Nama Poli</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="NamaPoli" size="25px" maxlength="30" placeholder="ketikkan nama poli..." value="<?php echo $isi['NamaPoli']; ?>" required>&nbsp;&nbsp;&nbsp; <input class="button" type="submit" value="Update"></td>
                    </tr>

                <?php } ?>
            </table>
        <?php
    }
        ?>