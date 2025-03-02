<?php
session_start();

// Koneksi ke database
include "koneksi.php";

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk memeriksa username dan password
$query = "SELECT * FROM user WHERE nama_user='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);

    // Pastikan kolom "role" tersedia dalam tabel
    if (isset($data['role'])) {
        $role = $data['role']; // Ambil role dari database
    } else {
        $role = 'karyawan'; // Default role jika tidak ditemukan
    }

    // Set session untuk username dan role
    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $role;

    // Redirect ke halaman dashboard sesuai role
    if ($role == 'admin') {
        header("Location: index.php");
        exit(); // Pastikan script berhenti setelah redirect
    } elseif ($role == 'karyawan') {
        header("Location: karyawan.php");
        exit();
    } else {
        echo "<script>alert('Role tidak dikenali.'); window.location='login.php';</script>";
    }
} else {
    // Jika username atau password salah
    echo "<script>alert('Login gagal. Periksa kembali username dan password Anda.'); window.location='login.php';</script>";
}
?>
