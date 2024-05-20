<!--Nomor 5-->
<?php
    include 'koneksi.php';

    // Mengecek apakah di url ada nilai GET idDosen
    if (isset($_GET['idDosen'])) {
        // Ambil nilai idDosen dari url dan disimpan dalam variabel $id
        $id = ($_GET["idDosen"]);

        // Menampilkan data t_dosen dari database yang mempunyai idDosen=$id
        $query = "SELECT * FROM t_dosen WHERE idDosen='$id'";
        $result = mysqli_query($link, $query);
        // Mengecek apakah query gagal
        if (!$result) {
            die ("Query gagal". mysqli_errno($link). " - ". mysqli_error($link));
        }
        /* Mengambil data dari database dan membuat variabel2 utk tampung data
        variabel ini nantinya akan tampil pada form */
        $data = mysqli_fetch_assoc($result);
        $idDosen = $data["idDosen"];
        $namaDosen = $data["namaDosen"];
        $noHP = $data["noHP"];
    } else {
        // apabila tidak ada data GET id akan di redirect ke index.php
        header("location: viewdosen.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            h1 {
                text-align: center;
            }
            .container {
                width: 400px;
                margin: auto;
            }
            fieldset {
                border: 1px solid #ccc;
                padding: 20px;
            }
            label {
                display: inline-block;
                width: 100px;
            }
            input[type="text"] {
                width: calc(100% - 110px);
                padding: 5px;
            }
            input[type="submit"] {
                display: block;
                width: 100%;
                padding: 10px;
                background-color: #4CAF50;
                color: white;
                border: none;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <h1>Edit Data</h1>
        <div class="container">
            <form id="form_mahasiswa" action="proses_editdosen.php" method="post">
                <fieldset>
                    <legend>Edit Data Dosen</legend>
                    <p>
                        <label for="idDosen">ID:</label>
                        <input type="hidden" name="idDosen" value="<?php echo $idDosen; ?>">
                        <input type="text" name="idDosenDisabled" id="idDosenDisabled" value="<?php echo $idDosen; ?>" disabled>
                    </p>
                    <p>
                        <label for="namaDosen">Nama Dosen:</label>
                        <input type="text" name="namaDosen" id="namaDosen" value="<?php echo $namaDosen; ?>">
                    </p>
                    <p>
                        <label for="noHP">No HP:</label>
                        <input type="text" name="noHP" id="noHP" value="<?php echo $noHP; ?>">
                    </p>
                </fieldset>
                <p>
                    <input type="submit" name="edit" value="Update Data">
                </p>
            </form>
        </div>
    </body>
</html>
