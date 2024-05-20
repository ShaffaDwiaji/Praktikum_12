<?php
    // variabel koneksi dengan database mySQL
    $host = "localhost";
    $user = "root";
    $paswd = "";
    $name = "crud_1";

    // proses koneksi
    $link = mysqli_connect($host, $user, $paswd, $name);

    // periksa konekesi, jika gagal akan menampilkan pesan error\
    if (!$link) {
        die ("Koneksi dengan database gagal: ". mysqli_connect_errno() . " - ". mysqli_connect_error());
    }
?>