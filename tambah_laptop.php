<?php
session_start();
require_once 'models/Laptop.php';

// 1. Cek Login Admin (Keamanan)
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Simpan Data (Jika Tombol Submit Ditekan)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $laptopModel = new Laptop();
    
    $data = [
        'brand' => $_POST['brand'],
        'model_name' => $_POST['model_name'],
        'price' => $_POST['price'],
        'ram_gb' => $_POST['ram_gb'],
        'weight_kg' => $_POST['weight_kg'],
        'processor' => $_POST['processor'],
        'gpu' => $_POST['gpu'],
        'screen_resolution' => $_POST['screen_resolution'],
        'memory_type' => $_POST['memory_type'],
        'os' => $_POST['os']
    ];

    if ($laptopModel->insertLaptop($data)) {
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Gagal menyimpan data.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Laptop - Admin</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background: #f4f4f4; }
        .container { background: white; max-width: 600px; margin: auto; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ddd; border-radius: 4px; }
        .btn-save { background: #28a745; color: white; padding: 10px; width: 100%; border: none; cursor: pointer; font-size: 16px; }
        .btn-back { display: block; text-align: center; margin-top: 10px; text-decoration: none; color: #555; }
    </style>
</head>
<body>

<div class="container">
    <h2>Tambah Laptop Baru</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label>Brand (Merek)</label>
            <input type="text" name="brand" placeholder="Contoh: Asus" required>
        </div>
        <div class="form-group">
            <label>Nama Model</label>
            <input type="text" name="model_name" placeholder="Contoh: ROG Zephyrus G14" required>
        </div>
        <div class="form-group">
            <label>Harga (Rupiah - Angka Saja)</label>
            <input type="number" name="price" placeholder="Contoh: 15000000" required>
        </div>
        <div class="form-group">
            <label>RAM (GB - Angka Saja)</label>
            <input type="number" name="ram_gb" placeholder="Contoh: 16" required>
        </div>
        <div class="form-group">
            <label>Berat (Kg - Pakai Titik untuk koma)</label>
            <input type="number" step="0.01" name="weight_kg" placeholder="Contoh: 1.5" required>
        </div>

        <hr> <div class="form-group">
            <label>Processor</label>
            <input type="text" name="processor" placeholder="Contoh: Intel Core i7">
        </div>
        <div class="form-group">
            <label>VGA / GPU</label>
            <input type="text" name="gpu" placeholder="Contoh: NVIDIA RTX 3060">
        </div>
        <div class="form-group">
            <label>Resolusi Layar</label>
            <input type="text" name="screen_resolution" placeholder="Contoh: 1920x1080">
        </div>
        <div class="form-group">
            <label>Tipe Memori</label>
            <input type="text" name="memory_type" placeholder="Contoh: 512GB SSD">
        </div>
        <div class="form-group">
            <label>Sistem Operasi</label>
            <input type="text" name="os" placeholder="Contoh: Windows 10">
        </div>

        <button type="submit" class="btn-save">Simpan Data</button>
        <a href="dashboard.php" class="btn-back">Batal & Kembali</a>
    </form>
</div>

</body>
</html>