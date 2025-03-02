<?php
$host = "localhost"; // Ganti dengan server Anda jika diperlukan
$user = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$db = "toko2"; // Ganti dengan nama database Anda

// Koneksi ke database
$data = mysqli_connect($host, $user, $password, $db);
if (!$data) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembelian</title>
    <style>
            body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f0f0f0;
}

.no-print {
    margin-top: 20px;
    text-align: center;
}

button {
    width: 100px;
    height: 30px;
    margin: 10px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #4CAF50;
    color: #fff;
    cursor: pointer;
}

button:hover {
    background-color: #3e8e41;
}

@media print {
    body {
        font-size: 12pt;
        font-family: Arial, sans-serif;
    }
    .no-print {
        display: none;
    }
} 
    </style>
</head>
<body>
    <h1>Struk Pembelian</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil data dari form
        $barang = unserialize($_POST['barang']);
        $harga = unserialize($_POST['harga']);
        $jumlah = unserialize($_POST['jumlah']);
        $total = $_POST['total'];

        // Simpan data ke tabel penjualan
        $stmt = $data->prepare("INSERT INTO detail_penjualan (nama_barang, harga_satuan, jml_barang, total_harga, created_at) VALUES (?, ?, ?, ?, NOW())");
        
        if ($stmt === false) {
            die("Error preparing statement: " . mysqli_error($data));
        }

        for ($i = 0; $i < count($barang); $i++) {
            $totalHarga = $harga[$i] * $jumlah[$i];
            $stmt->bind_param("siii", $barang[$i], $harga[$i], $jumlah[$i], $totalHarga);
            $stmt->execute();
        }

        // Tampilkan struk
        echo "<h2>Daftar Barang:</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>";

        for ($i = 0; $i < count($barang); $i++) {
            $totalHarga = $harga[$i] * $jumlah[$i];
            echo "<tr>
                    <td>" . htmlspecialchars($barang[$i]) . "</td>
                    <td>" . htmlspecialchars($harga[$i]) . "</td>
                    <td>" . htmlspecialchars($jumlah[$i]) . "</td>
                    <td>" . htmlspecialchars($totalHarga) . "</td>
                  </tr>";
        }

        echo "</table>";
        echo "<h3>Total Keseluruhan: " . htmlspecialchars($total) . "</h3>";

        // Tutup statement
        $stmt->close();
    } else {
        echo "<p>Data tidak ditemukan.</p>";
    }

    // Tutup koneksi
    mysqli_close($data);
    ?>

    <div class="no-print">
        <br>
        <button onclick="window.print()">Cetak Struk</button>
        <button onclick="window.history.back()">Kembali</button>
    </div>
</body>
</html>