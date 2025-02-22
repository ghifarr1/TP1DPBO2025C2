<?php
include "Petshop.php";
session_start();

// Inisialisasi session jika belum ada
if (!isset($_SESSION['daftarProduk'])) {
    $_SESSION['daftarProduk'] = [];
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'add':
            $idProduk = htmlspecialchars($_POST['idProduk']);
            $namaProduk = htmlspecialchars($_POST['namaProduk']);
            $kategoriProduk = htmlspecialchars($_POST['kategoriProduk']);
            $hargaProduk = (int)$_POST['hargaProduk'];
            $gambarProduk = '';

            // Cek ID duplikat
            $idExists = false;
            foreach ($_SESSION['daftarProduk'] as $produk) {
                if ($produk->getIdProduk() === $idProduk) {
                    $idExists = true;
                    break;
                }
            }

            if (!$idExists) {
                // Handle file upload
                if (!empty($_FILES['gambar']['name'])) {
                    $targetDir = "uploads/";
                    if (!file_exists($targetDir)) {
                        mkdir($targetDir, 0777, true);
                    }
                    $gambarProduk = $targetDir . uniqid() . "_" . basename($_FILES['gambar']['name']);
                    move_uploaded_file($_FILES['gambar']['tmp_name'], $gambarProduk);
                }

                // Tambahkan produk baru
                $_SESSION['daftarProduk'][] = new Petshop(
                    $idProduk,
                    $namaProduk,
                    $kategoriProduk,
                    $hargaProduk,
                    $gambarProduk
                );
            }
            break;

        case 'update':
            $idProduk = $_POST['idProduk'];
            foreach ($_SESSION['daftarProduk'] as &$produk) {
                if ($produk->getIdProduk() === $idProduk) {
                    // Update data
                    $produk->setNamaProduk($_POST['namaProduk']);
                    $produk->setKategoriProduk($_POST['kategoriProduk']);
                    $produk->setHargaProduk($_POST['hargaProduk']);

                    // Handle file upload baru
                    if (!empty($_FILES['gambar']['name'])) {
                        // Hapus gambar lama jika ada
                        if ($produk->getGambarProduk() && file_exists($produk->getGambarProduk())) {
                            unlink($produk->getGambarProduk());
                        }
                        
                        // Upload gambar baru
                        $targetDir = "uploads/";
                        $gambarProduk = $targetDir . uniqid() . "_" . basename($_FILES['gambar']['name']);
                        move_uploaded_file($_FILES['gambar']['tmp_name'], $gambarProduk);
                        $produk->setGambarProduk($gambarProduk);
                    }
                    break;
                }
            }
            break;

        case 'delete':
            $idProduk = $_POST['idProduk'];
            foreach ($_SESSION['daftarProduk'] as $key => $produk) {
                if ($produk->getIdProduk() === $idProduk) {
                    // Hapus gambar jika ada
                    if ($produk->getGambarProduk() && file_exists($produk->getGambarProduk())) {
                        unlink($produk->getGambarProduk());
                    }
                    // Hapus dari array dan re-index
                    unset($_SESSION['daftarProduk'][$key]);
                    $_SESSION['daftarProduk'] = array_values($_SESSION['daftarProduk']);
                    break;
                }
            }
            break;
    }

    header("Location: Main.php");
    exit;
}

// Handle edit request
$editProduk = null;
if (isset($_GET['edit'])) {
    $editId = $_GET['edit'];
    foreach ($_SESSION['daftarProduk'] as $produk) {
        if ($produk->getIdProduk() === $editId) {
            $editProduk = $produk;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Petshop Data Manager</title>
</head>
<body>
    <h1>Petshop Data Manager</h1>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="action" value="<?= $editProduk ? 'update' : 'add' ?>">
            <?php if ($editProduk): ?>
                <input type="hidden" name="idProduk" value="<?= htmlspecialchars($editProduk->getIdProduk()) ?>">
            <?php else: ?>
                <label>ID:</label>
                <input type="text" name="idProduk" value="<?= htmlspecialchars($editProduk ? $editProduk->getIdProduk() : '') ?>" required>
            <?php endif; ?>

            <label>Name:</label>
            <input type="text" name="namaProduk" value="<?= htmlspecialchars($editProduk ? $editProduk->getNamaProduk() : '') ?>" required>
        </div>

        <div class="form-group">
            <label>Kategori:</label>
            <input type="text" name="kategoriProduk" value="<?= htmlspecialchars($editProduk ? $editProduk->getKategoriProduk() : '') ?>" required>
        </div>

        <div class="form-group">
            <label>Harga:</label>
            <input type="number" name="hargaProduk" min="0" step="1000" value="<?= htmlspecialchars($editProduk ? $editProduk->getHargaProduk() : '') ?>" required>
        </div>

        <div class="form-group">
            <label>Upload Image:</label>
            <input type="file" name="gambar" accept="image/*">
            <?php if ($editProduk && $editProduk->getGambarProduk()): ?>
                <p>Current Image:</p>
                <img src="<?= htmlspecialchars($editProduk->getGambarProduk()) ?>" width="100">
            <?php endif; ?>
        </div>

        <button type="submit"><?= $editProduk ? 'Update' : 'Add' ?></button>
        <?php if ($editProduk): ?>
            <a href="Main.php">Cancel</a>
        <?php endif; ?>
    </form>

    <!-- Tabel Data -->
    <?php if (!empty($_SESSION['daftarProduk'])): ?>
        <table>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Actions</th>
            </tr>
            <?php $counter = 1; ?>
            <?php foreach ($_SESSION['daftarProduk'] as $produk): ?>
                <tr>
                    <td><?= $counter++ ?></td>
                    <td><?= htmlspecialchars($produk->getIdProduk()) ?></td>
                    <td>
                        <?php if ($produk->getGambarProduk()): ?>
                            <img src="<?= htmlspecialchars($produk->getGambarProduk()) ?>" width="100">
                        <?php else: ?>
                            No Image
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($produk->getNamaProduk()) ?></td>
                    <td><?= htmlspecialchars($produk->getKategoriProduk()) ?></td>
                    <td><?= number_format($produk->getHargaProduk(), 0, ',', '.') ?></td>
                    <td>
                        <a href="Main.php?edit=<?= htmlspecialchars($produk->getIdProduk()) ?>">Edit</a>
                        <form method="post" style="display: inline;">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="idProduk" value="<?= htmlspecialchars($produk->getIdProduk()) ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No records found.</p>
    <?php endif; ?>
</body>
</html>