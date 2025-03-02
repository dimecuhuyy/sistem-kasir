<?php
include('koneksi.php'); // Koneksi ke database

// Cek apakah ada ID yang dikirim melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data pelanggan berdasarkan ID
    $query = "SELECT * FROM pelanggan WHERE id_pelanggan = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
}

// Update data pelanggan
if (isset($_POST['submit'])) {
    $id = $_POST['id_pelanggan'];
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];

    // Query untuk update data pelanggan
    $update_query = "UPDATE pelanggan SET id_pelanggan='$id', nama='$nama', gender='$gender' WHERE id_pelanggan='$id'";
    if (mysqli_query($conn, $update_query)) {
        header('Location: pelanggan.php'); // Redirect ke halaman utama setelah update
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
    <title>Edit Data Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container edit-container">
        <h1>Edit Data Pelanggan</h1>

        <form action="edit_pelanggan.php?id=<?php echo $data['id_pelanggan']; ?>" method="POST">
            <label for="id_pelanggan">ID:</label><br>
            <input type="text" name="id_pelanggan" value="<?php echo $data['id_pelanggan']; ?>" required><br><br>

            <label for="nama">Nama:</label><br>
            <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required><br><br>

            <label for="gender">Gender:</label><br>
            <select name="gender" required>
                <option value="<?php echo $data['gender']; ?>"><?php echo $data['gender']; ?></option>
                <option value="P">Perempuan</option>
                <option value="L">Laki-laki</option>
            </select><br><br>

            <button type="submit" name="submit">Update Pelanggan</button>
        </form>
    </div>
</body>
</html>