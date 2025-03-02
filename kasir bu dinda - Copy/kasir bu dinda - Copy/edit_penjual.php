<?php
include('koneksi.php'); // Koneksi ke database

// Cek apakah ada ID yang dikirim melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data transaksi berdasarkan ID
    $query = "SELECT * FROM penjualan WHERE id_transaksi = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
}

// Update data transaksi
if (isset($_POST['submit'])) {
    $id = $_POST['id_transaksi'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $tgl_transaksi = $_POST['tgl_transaksi'];
    $total_transaksi = $_POST['total_transaksi'];

    // Query untuk update data transaksi
    $update_query = "UPDATE penjualan SET id_transaksi='$id', id_pelanggan='$id_pelanggan', tgl_transaksi='$tgl_transaksi', total_transaksi='$total_transaksi' WHERE id_transaksi='$id'";
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
    <title>Edit Data Transaksi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container edit-container">
        <h1>Edit Data Transaksi</h1>

        <form action="edit_penjual.php?id=<?php echo $data['id_transaksi']; ?>" method="POST">
            <label for="id_transaksi">ID Transaksi:</label><br>
            <input type="text" name="id_transaksi" value="<?php echo $data['id_transaksi']; ?>" required><br><br>

            <label for="id_pelanggan">ID Pelanggan:</label><br>
            <input type="text" name="id_pelanggan" value="<?php echo $data['id_pelanggan']; ?>" required><br><br>

            <label for="tgl_transaksi">Tanggal Transaksi:</label><br>
            <input type="date" name="tgl_transaksi" value="<?php echo $data['tgl_transaksi']; ?>" required><br><br>

            <label for="total_transaksi">Total Transaksi:</label><br>
            <input type="text" name="total_transaksi" value="<?php echo $data['total_transaksi']; ?>" required><br><br>

            <button type="submit" name="submit">Update Transaksi</button>
        </form>
    </div>
</body>
</html>