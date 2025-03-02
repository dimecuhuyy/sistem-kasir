<?php
include('koneksi.php'); // Koneksi ke database

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data siswa berdasarkan ID
    $query = "DELETE FROM barang WHERE id_barang = $id";
    if (mysqli_query($conn, $query)) {
        header('Location: index.php'); // Redirect setelah data dihapus
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
