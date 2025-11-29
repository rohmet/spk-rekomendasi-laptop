<?php
session_start();
require_once 'models/Bookmark.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$bookmarkModel = new Bookmark();
$myLaptops = $bookmarkModel->getMyBookmarks($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laptop Impian Saya</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background: #f9f9f9; }
        .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h2 { border-bottom: 2px solid #007bff; padding-bottom: 10px; }
        .item { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding: 15px 0; }
        .item-info h4 { margin: 0 0 5px 0; }
        .item-info p { margin: 0; color: #666; font-size: 14px; }
        .btn-delete { background: #dc3545; color: white; text-decoration: none; padding: 8px 12px; border-radius: 4px; font-size: 14px; }
        .btn-back { display: inline-block; margin-bottom: 20px; text-decoration: none; color: #555; }
    </style>
</head>
<body>

<div class="container">
    <a href="rekomendasi.php" class="btn-back">← Kembali cari laptop</a>
    
    <h2>❤️ Laptop Impian Saya</h2>

    <?php if ($myLaptops->num_rows > 0): ?>
        <?php while($row = $myLaptops->fetch_assoc()): ?>
            <div class="item">
                <div class="item-info">
                    <h4><?php echo $row['brand'] . " " . $row['model_name']; ?></h4>
                    <p>Harga: Rp <?php echo number_format($row['price'], 0, ',', '.'); ?> | RAM: <?php echo $row['ram_gb']; ?>GB</p>
                </div>
                <a href="hapus_bookmark.php?id=<?php echo $row['id_bookmark']; ?>" class="btn-delete" onclick="return confirm('Hapus dari favorit?')">Hapus</a>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p style="text-align:center; padding: 30px;">Belum ada laptop yang disimpan.</p>
    <?php endif; ?>
</div>

</body>
</html>