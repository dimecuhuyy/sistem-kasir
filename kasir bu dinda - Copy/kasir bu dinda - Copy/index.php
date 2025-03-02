<?php
include('koneksi.php'); // Koneksi ke database


// Cek apakah user sudah login

// Query untuk mengambil semua data siswa
$query = "SELECT * FROM barang";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
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
        <a href="tambah_barang.php"><button type="button">Tambah Barang</button></a>
        </div>
        </div>

        <!-- Tabel Daftar Siswa -->
        <table>
            <thead>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menampilkan data siswa
                $no = 1;
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$data['id_barang']}</td>";
                    echo "<td>{$data['nama_barang']}</td>";
                    echo "<td>{$data['harga_barang']}</td>";
                    echo "<td>{$data['stock']}</td>";
                    echo "<td>
                            <a href='edit_barang.php?id={$data['id_barang']}'>Edit</a> / 
                            <a href='hapus_barang.php?id={$data['id_barang']}'>Hapus</a>
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