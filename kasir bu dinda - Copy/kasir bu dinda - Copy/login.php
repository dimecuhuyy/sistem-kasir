<?php
include('koneksi.php'); // Koneksi ke database
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Menambahkan link ke file CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>

        <?php
        if (isset($_POST['login'])) {
            include('cek_login.php'); // Include file cek_login.php
        }
        ?>

        <form action="" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" name="username" id="username" required><br><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required><br><br>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>