<?php
include('koneksi.php'); // Koneksi ke database


// Cek apakah user sudah login

// Query untuk mengambil semua data siswa
$query = "SELECT * FROM pelanggan";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .navbar {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
        }
        .navbar ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .navbar li {
            display: inline-block;
            margin-right: 20px;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
        }
        .navbar a:hover {
            color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>TOKO</h1>
            <a href="logout.php">Logout</a>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Barang</a></li>
                <li><a href="detil_penjualan.php">Detil Penjualan</a></li>
                <li><a href="pelanggan.php">Pelanggan</a></li>
                <li><a href="penjual.php">Penjualan</a></li>
            </ul>
        </nav>

        <!-- Tombol untuk menambah siswa -->
        <div>
            <a href="tambah_pelanggan.php"><button type="button">Tambah Pelanggan</button></a>
        </div>

        <!-- Tabel Daftar Siswa -->
        <table>
            <thead>
                <tr>
                    <th>ID Pelanggan</th>
                    <th>Nama</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menampilkan data siswa
                $no = 1;
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$data['id_pelanggan']}</td>";
                    echo "<td>{$data['nama']}</td>";
                    echo "<td>{$data['gender']}</td>";
                    echo "<td>
                            <a href='edit_pelanggan.php?id={$data['id_pelanggan']}'>Edit</a> / 
                            <a href='hapus_pelanggan.php?id={$data['id_pelanggan']}'>Hapus</a>
                          </td>";
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>