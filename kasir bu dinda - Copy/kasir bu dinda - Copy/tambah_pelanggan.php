<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pelanggan</title>
    <!-- Menambahkan link ke file CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Data Pelanggan</h1>

        <?php
        include('koneksi.php'); // Koneksi ke database

        if (isset($_POST['submit'])) {
            $id = $_POST['id_pelanggan'];
            $nama = $_POST['nama'];
            $gender = $_POST['gender'];

            // Query untuk memasukkan data siswa
            $sql = "INSERT INTO pelanggan (id_pelanggan, nama, gender) VALUES ('$id', '$nama', '$gender')";
            if (mysqli_query($conn, $sql)) {
                echo "Data pelanggan berhasil ditambahkan!";
                header('Location: pelanggan.php');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        ?>

        <form action="tambah_pelanggan.php" method="POST">
            <label for="nis">ID:</label><br>
            <input type="text" name="id_pelanggan" id="id_pelanggan" required><br><br>
            <label for="nama">Nama:</label><br>
            <input type="text" name="nama" id="nama" required><br><br>
            <label for="kelas">Gender:</label><br>
            <select name="gender" id="gender" required>
                <option value="">Pilih Gender</option>
                <option value="P">Perempuan</option>
                <option value="L">Laki-laki</option>
            </select><br><br>
            <button type="submit" name="submit">Tambah pelanggan</button>
        </form>
    </div>
</body>
</html>