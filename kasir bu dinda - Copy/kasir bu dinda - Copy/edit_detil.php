<?php
include('koneksi.php'); // Koneksi ke database

// Cek apakah ada ID yang dikirim melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data transaksi detil berdasarkan ID
    $query = "SELECT * FROM detail_penjualan WHERE id_transaksi_detail = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
}

// Update data transaksi detil
if (isset($_POST['submit'])) {
    $id = $_POST['id_transaksi_detail'];
    $id_transaksi = $_POST['id_transaksi'];
    $id_barang = $_POST['id_barang'];
    $jml_barang = $_POST['jml_barang'];
    $harga_satuan = $_POST['harga_satuan'];

    // Query untuk update data transaksi detil
    $update_query = "UPDATE detail_penjualan SET id_transaksi_detail='$id', id_transaksi='$id_transaksi', id_barang='$id_barang', jml_barang='$jml_barang', harga_satuan='$harga_satuan' WHERE id_transaksi_detail='$id'";
    if (mysqli_query($conn, $update_query)) {
        header('Location: detil_penjualan.php'); // Redirect ke halaman utama setelah update
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
    <title>Edit Data Transaksi Detil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container edit-container">
        <h1>Edit Data Transaksi Detil</h1>

        <form action="edit_detil.php?id=<?php echo $data['id_transaksi_detail']; ?>" method="POST">
            <label for="id_transaksi_detail">ID Transaksi Detil:</label><br>
            <input type="text" name="id_transaksi_detail" value="<?php echo $data['id_transaksi_detail']; ?>" required><br><br>

            <label for="id_transaksi">ID Transaksi:</label><br>
            <input type="text" name="id_transaksi" value="<?php echo $data['id_transaksi']; ?>" required><br><br>

            <label for="id_barang">ID Barang:</label><br>
            <input type="text" name="id_barang" value="<?php echo $data['id_barang']; ?>" required><br><br>

            <label for="jml_barang">Jumlah Barang:</label><br>
            <input type="text" name="jml_barang" value="<?php echo $data['jml_barang']; ?>" required><br><br>

            <label for="harga_satuan">Harga Satuan:</label><br>
            <input type="text" name="harga_satuan" value="<?php echo $data['harga_satuan']; ?>" required><br><br>

            <button type="submit" name="submit">Update Transaksi Detil</button>
        </form>
    </div>
</body>
</html>