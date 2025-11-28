<?php

require_once 'models/Laptop.php';
$laptopModel = new Laptop();
$laptops = $laptopModel->getRecent();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Rekomendasi Laptop</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h1>Selamat Datang di SPK Laptop</h1>
    <p>Menampilkan 10 Data Laptop Terbaru dari Database (Test MVC)</p>

    <table>
        <thead>
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Harga (Rp)</th>
                <th>RAM (GB)</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($laptops && $laptops->num_rows > 0) {
                while($row = $laptops->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['brand'] . "</td>";
                    echo "<td>" . $row['model_name'] . "</td>";
                    // Format angka jadi mata uang
                    echo "<td>Rp " . number_format($row['price'], 0, ',', '.') . "</td>"; 
                    echo "<td>" . $row['ram_gb'] . " GB</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data laptop. Pastikan import CSV berhasil.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>