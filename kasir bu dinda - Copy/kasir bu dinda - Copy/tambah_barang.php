<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <!-- Menambahkan link ke file CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Data Barang</h1>

        <?php
        include('koneksi.php'); // Koneksi ke database

        if (isset($_POST['submit'])) {
            $id = $_POST['id_barang'];
            $nama = $_POST['nama_barang'];
            $harga = $_POST['harga_barang'];
            $stock = $_POST['stock'];

            // Query untuk memasukkan data siswa
            $sql = "INSERT INTO barang (id_barang, nama_barang, harga_barang, stock) VALUES ('$id', '$nama', '$harga', '$stock')";
            if (mysqli_query($conn, $sql)) {
                echo "Data barang berhasil ditambahkan!";
                header('Location: index.php');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        ?>

        <form action="tambah_barang.php" method="POST">
            <label for="nis">ID:</label><br>
            <input type="text" name="id_barang" id="id_barang" required><br><br>
            <label for="nama">Nama barang:</label><br>
            <input type="text" name="nama_barang" id="nama_barang" required><br><br>
            <label for="kelas">Harga barang:</label><br>
            <input type="text" name="harga_barang" id="harga_barang" required><br><br>
            <label for="jurusan">stock:</label><br>
            <input type="text" name="stock" id="stock" required><br><br>
            <button type="submit" name="submit">Tambah barang</button>
        </form>
    </div>
</body>
</html>
