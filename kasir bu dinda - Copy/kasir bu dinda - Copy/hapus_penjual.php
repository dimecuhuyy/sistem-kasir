<?php
include('koneksi.php'); // Koneksi ke database

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data transaksi berdasarkan ID
    $query = "DELETE FROM penjual WHERE id_transaksi = $id";
    if (mysqli_query($conn, $query)) {
        header('Location: penjual.php'); // Redirect setelah data dihapus
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>