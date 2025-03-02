<?php
include('koneksi.php'); // Koneksi ke database


// Cek apakah user sudah login

// Query untuk mengambil semua data siswa
$query = "SELECT * FROM detail_penjualan";
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
            <a href="tambah_detil.php"><button type="button">Tambah Data</button></a>
        </div>

        <!-- Tabel Daftar Siswa -->
        <table>
            <thead>
                <tr>
                    <th>ID transaksi detil</th>
                    <th>ID transaksi </th>
                    <th>ID Barang</th>
                    <th>JML Barang</th>
                    <th>Harga Satuan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menampilkan data siswa
                $no = 1;
                while ($data = mysqli_fetch_assoc($result)) {
                    $query_detil_penjualan = "SELECT * FROM detail_penjualan WHERE id_transaksi_detail = '$data[id_transaksi_detail]'";
                    $result_detil_penjualan = mysqli_query($conn, $query_detil_penjualan);
                    $data_detil_penjualan = mysqli_fetch_assoc($result_detil_penjualan);
                    echo "<tr>";
                    echo "<td>{$data['id_transaksi_detail']}</td>";
                    echo "<td>{$data['id_transaksi']}</td>";
                    echo "<td>{$data['id_barang']}</td>";
                    echo "<td>{$data['jml_barang']}</td>";
                    echo "<td>{$data['harga_satuan']}</td>";
                    echo "<td>
                            <a href='edit_detil.php?id={$data['id_transaksi_detail']}'>Edit</a> / 
                            <a href='hapus_detil.php?id={$data['id_transaksi_detail']}'>Hapus</a>
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