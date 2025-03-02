<?php
include('koneksi.php'); // Koneksi ke database

// Cek apakah ada ID yang dikirim melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data siswa berdasarkan ID
    $query = "SELECT * FROM barang WHERE id_barang = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
}

// Update data siswa
if (isset($_POST['submit'])) {
    $id = $_POST['id_barang'];
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga_barang'];
    $stock = $_POST['stock'];

    // Query untuk update data siswa
    $update_query = "UPDATE barang SET id_barang='$id', nama_barang='$nama', harga_barang='$harga', stock='$stock' WHERE id_barang='$id'";
    if (mysqli_query($conn, $update_query)) {
        header('Location: index.php'); // Redirect ke halaman utama setelah update
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Barang</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container edit-container">
        <h1>Edit Data Barang</h1>

        <form action="edit_Barang.php?id=<?php echo $data['id_barang']; ?>" method="POST">
            <label for="id_barang">id:</label><br>
            <input type="text" name="id_barang" value="<?php echo $data['id_barang']; ?>" required><br><br>

            <label for="nama_barang">Nama Barang:</label><br>
            <input type="text" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" required><br><br>

            <label for="harga_barang">harga barang:</label><br>
            <input type="text" name="harga_barang" value="<?php echo $data['harga_barang']; ?>" required><br><br>

            <label for="stock">stock:</label><br>
            <input type="text" name="stock" value="<?php echo $data['stock']; ?>" required><br><br>

            <button type="submit" name="submit">Update Barang</button>
        </form>
    </div>
</body>
</html>