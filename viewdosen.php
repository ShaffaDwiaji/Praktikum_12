<!--Nomor 4-->
<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
                width: 840px;
                margin: auto;
            }
            h1 {
                text-align: center;
            }
            a {
                text-decoration: none;
            }
            a:visited {
                color: blue;
            }
            a:hover {
                color: red;
            }
        </style>
    </head>
    <body>
        <h1>Tabel Dosen</h1>
        <center><a href="input.php">Input Data</a></center>
        <br/>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nama Dosen</th>
                <th>No HP</th>
                <th>Pilihan</th>
            </tr>
            <?php
                // Jalankan query untuk menampilkan semua data diurutkan berdasarkan idDosen
                $query = "SELECT * FROM t_dosen ORDER BY idDosen ASC";
                $result = mysqli_query($link, $query);

                // Mengecek apakah ada error ketika menjalankan query
                if (!$result) {
                    die ("Query error: " . mysqli_errno($link) ." - ". mysqli_error($link));
                }

                /* Hasil Query akan disimpan dalam variabel $data dalam bentuk array
                kemudian dicetak dengan perulangan while*/
                while ($data = mysqli_fetch_assoc($result)) {
                    // Menampilkan Data
                    echo "<tr>";
                    echo "<td>$data[idDosen]</td>";
                    echo "<td>" . htmlentities($data['namaDosen']). "</td>";
                    echo "<td>" . htmlentities($data['noHP']). "</td>";
                    // Memubuat link untuk mengedit dan menghapus data
                    echo '<td>
                    <a href="editdosen.php?idDosen='. $data['idDosen'] .'">Edit</a> / 
                    <a href="hapusdosen.php?idDosen='. $data['idDosen'].'"
                        onclick="return confirm(\'Anda yakin akan menghapus data?\')">Hapus</a>
                    </td>';
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>