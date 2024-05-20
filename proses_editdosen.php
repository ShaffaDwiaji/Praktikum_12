<!--Nomor 6-->
<?php
    // Mengecek apakah tombol edit telah ditekan
    if (isset($_POST['edit'])) {
        include 'koneksi.php';

        // Membuat variabel untuk menampung data dari form edit
        $id = $_POST['idDosen'];
        $namaDosen = $_POST['namaDosen'];
        $noHP = $_POST['noHP'];

            // Membuat dan menjalankan query UPDATE
            $query = "UPDATE t_dosen SET namaDosen = '$namaDosen', noHP = '$noHP' WHERE idDosen = '$id'";
            $result = mysqli_query($link, $query);

            // Memeriksa query apakah ada error
            if (!$result) {
                die ("Queury gagal dijalankan: ". mysqli_errno($link) . " - ". mysqli_error($link));
            }
    }

    header("location: viewdosen.php");
?>