<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Detil Penjualan</title>
    <!-- Menambahkan link ke file CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Data Detil Penjualan</h1>

        <?php
        include('koneksi.php'); // Koneksi ke database

        if (isset($_POST['submit'])) {
            $id_transaksi_detil = $_POST['id_transaksi_detail'];
            $id_transaksi = $_POST['id_transaksi'];
            $id_barang = $_POST['id_barang'];
            $jml_barang = $_POST['jml_barang'];
            $harga_satuan = $_POST['harga_satuan'];

            // Query untuk memasukkan data siswa
            $sql = "INSERT INTO detail_penjualan (id_transaksi_detail, id_transaksi, id_barang, jml_barang, harga_satuan) VALUES ('$id_transaksi_detil', '$id_transaksi', '$id_barang', '$jml_barang', '$harga_satuan')";
            if (mysqli_query($conn, $sql)) {
                echo "Data detil penjualan berhasil ditambahkan!";
                header('Location: detil_penjualan.php');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        ?>

        <form action="tambah_detil.php" method="POST">
            <label for="nis">ID Transaksi Detil:</label><br>
            <input type="text" name="id_transaksi_detail" id="id_transaksi_detail" required><br><br>
            <label for="nama">ID Transaksi:</label><br>
            <input type="text" name="id_transaksi" id="id_transaksi" required><br><br>
            <label for="kelas">ID Barang:</label><br>
            <input type="text" name="id_barang" id="id_barang" required><br><br>
            <label for="jurusan">JML Barang:</label><br>
            <input type="text" name="jml_barang" id="jml_barang" required><br><br>
            <label for="jurusan">Harga Satuan:</label><br>
            <input type="text" name="harga_satuan" id="harga_satuan" required><br><br>
            <button type="submit" name="submit">Tambah detil penjualan</button>
        </form>
    </div>
</body>
</html>