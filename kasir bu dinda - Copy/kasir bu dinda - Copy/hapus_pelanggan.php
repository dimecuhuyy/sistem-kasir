<?php
include('koneksi.php'); // Koneksi ke database

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data pelanggan berdasarkan ID
    $query = "DELETE FROM pelanggan WHERE id_pelanggan = $id";
    if (mysqli_query($conn, $query)) {
        header('Location: pelanggan.php'); // Redirect setelah data dihapus
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>