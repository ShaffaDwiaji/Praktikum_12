<!--Nomor 3-->
<?php
    // Memanggil file koneksi.php untuk melakukan koneksi database
    include 'koneksi.php';

    // Mengecek apakah tombol input dari form telah ditekan
    if (isset($_POST['input'])) {
        // Membuat variabel untuk menampung data dari form
        $namaDosen = $_POST['namaDosen'];
        $noHP = $_POST['noHP'];

        // Jalankan query INSERT untuk menambah data ke database
        $query = "INSERT INTO t_dosen VALUES (NULL, '$namaDosen', '$noHP')";
        $result = mysqli_query($link, $query);

        // Periksa query apakah ada error
        if (!$result) {
            die ("Queury gagal dijalankan: ". mysqli_errno($link) . " - ". mysqli_error($link));
        }
    }

    // Melakukan redirect ke halaman viewdosen.php
    header("location: viewdosen.php");
?>