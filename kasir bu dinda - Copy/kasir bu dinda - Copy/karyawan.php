<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Kasir Sederhana</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    width: 500px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
}

input[type="text"], input[type="number"] {
    width: 100%;
    height: 40px;
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button[type="button"] {
    width: 100%;
    height: 40px;
    margin-bottom: 20px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #4CAF50;
    color: #fff;
    cursor: pointer;
}

button[type="button"]:hover {
    background-color: #3e8e41;
}

input[type="submit"] {
    width: 100%;
    height: 40px;
    margin-bottom: 20px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #4CAF50;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #3e8e41;
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

.error {
    color: red;
    font-size: 12px;
    margin-bottom: 10px;
}

#daftarBarang {
    margin-top: 20px;
}
    </style>
</head>
<body>
    <h1>Aplikasi Kasir Sederhana</h1>
    <form method="post">
        <div id="barangList">
            <div class="barangItem">
                <label for="barang">Nama Barang:</label>
                <input type="text" name="barang[]" required>
                <br>
                <label for="harga">Harga Barang:</label>
                <input type="number" name="harga[]" required>
                <br>
                <label for="jumlah">Jumlah Barang:</label>
                <input type="number" name="jumlah[]" required>
                <br><br>
            </div>
        </div>
        <button type="button" onclick="tambahBarang()">Tambah Barang</button>
        <br><br>
        <input type="submit" name="submit" value="Hitung Total">
    </form>

    <div id="daftarBarang"></div>

    <?php
    if (isset($_POST['submit'])) {
        $barang = $_POST['barang'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];
        $total = 0;

        // Cek apakah ada barang yang sama
        $uniqueBarang = array_unique($barang);
        if (count($uniqueBarang) < count($barang)) {
            echo '<p class="error">Nama barang tidak boleh sama. Silakan periksa kembali.</p>';
        } else {
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
                $total += $totalHarga;
            }

            echo "</table>";
            echo "<h3>Total Keseluruhan: " . htmlspecialchars($total) . "</h3>";
            echo '<form method="post" action="cetak.php">
                    <input type="hidden" name="total" value="' . htmlspecialchars($total) . '">
                    <input type="hidden" name="barang" value="' . htmlspecialchars(serialize($barang)) . '">
                    <input type="hidden" name="harga" value="' . htmlspecialchars(serialize($harga)) . '">
                    <input type="hidden" name="jumlah" value="' . htmlspecialchars(serialize($jumlah)) . '">
                    <input type="submit" value="Cetak Struk">
                  </form>';
        }
    }
    ?>

    <script>
        function tambahBarang() {
            const barangList = document.getElementById('barangList');
            const newBarang = document.createElement('div');
            newBarang.classList.add('barangItem');
            newBarang.innerHTML = `
                <label for="barang">Nama Barang:</label>
                <input type="text" name="barang[]" required>
                <br>
                <label for="harga">Harga Barang:</label>
                <input type="number" name="harga[]" required>
                <br>
                <label for="jumlah">Jumlah Barang:</label>
                <input type="number" name="jumlah[]" required>
                <br><br>
            `;
            barangList.appendChild(newBarang);
        }
    </script>
</body>
</html> 