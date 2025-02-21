<!DOCTYPE html>

<?php
include "Petshop.php"; // import class petshop

echo "==============================================================="."<br/>";
echo "===== WELCOME TO MIAW MIAW PETSHOP PRODUCT MANAGEMENT ====="."<br/>";
echo "==============================================================="."<br/>";


?>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data</title>
</head>
<body>
    <h2>Form Pendaftaran</h2>
    <form action="proses.php" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label for="usia">Usia:</label>
        <input type="number" id="usia" name="usia" required>
        <br><br>

        <button type="submit">Kirim</button>
    </form>
</body>
</html>