<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cari Laptop Impian - SPK SAW</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f0f2f5; padding: 20px; }
        .container { max-width: 900px; margin: auto; }
        
        /* Card Form */
        .card-form { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .range-group { margin-bottom: 20px; }
        .range-group label { display: block; font-weight: bold; margin-bottom: 10px; }
        input[type=range] { width: 100%; }
        
        /* Table Style */
        .result-table { width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .result-table th { background: #007bff; color: white; padding: 15px; text-align: left; }
        .result-table td { padding: 15px; border-bottom: 1px solid #eee; }
        .score-badge { background: #28a745; color: white; padding: 5px 10px; border-radius: 20px; font-weight: bold; font-size: 0.9em; }
        
        .btn-hitung { background: #007bff; color: white; border: none; padding: 12px 25px; border-radius: 5px; font-size: 16px; cursor: pointer; width: 100%; }
        .btn-hitung:hover { background: #0056b3; }
        .nav-top { margin-bottom: 20px; text-align: right; }
        .nav-top a { text-decoration: none; color: #555; margin-left: 15px; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <div class="nav-top">
        <a href="index.php">🏠 Home</a>

        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="index.php?controller=bookmark&action=index">❤️ Favorit</a>
            
            <a href="index.php?controller=auth&action=logout">Logout</a>
        <?php else: ?>
            <a href="index.php?controller=auth&action=login">Login</a>
        <?php endif; ?>
    </div>

    <div class="card-form">
        <h2 style="text-align:center">🔍 Tentukan Prioritas Laptopmu</h2>
        <p style="text-align:center; color:#666;">Geser slider sesuai kepentingan Anda. Total tidak harus 100%, sistem akan menyesuaikan.</p>
        
        <form method="POST">
            <div class="range-group">
                <label>💰 Harga Murah (Low Cost) - Bobot: <span id="val_harga"><?php echo $b_harga; ?></span>%</label>
                <input type="range" name="bobot_harga" min="0" max="100" value="<?php echo $b_harga; ?>" oninput="document.getElementById('val_harga').innerText = this.value">
            </div>

            <div class="range-group">
                <label>🚀 Performa / RAM Besar (High Spec) - Bobot: <span id="val_ram"><?php echo $b_ram; ?></span>%</label>
                <input type="range" name="bobot_ram" min="0" max="100" value="<?php echo $b_ram; ?>" oninput="document.getElementById('val_ram').innerText = this.value">
            </div>

            <div class="range-group">
                <label>🪶 Ringan Dibawa (Low Weight) - Bobot: <span id="val_berat"><?php echo $b_berat; ?></span>%</label>
                <input type="range" name="bobot_berat" min="0" max="100" value="<?php echo $b_berat; ?>" oninput="document.getElementById('val_berat').innerText = this.value">
            </div>

            <button type="submit" name="hitung" class="btn-hitung">🔥 Hitung Rekomendasi</button>
        </form>
    </div>

    <?php if($submitted): ?>
        <h3 style="margin-bottom:15px">🏆 Top 20 Hasil Rekomendasi Untukmu</h3>
        <table class="result-table">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Laptop</th>
                    <th>Harga</th>
                    <th>RAM</th>
                    <th>Berat</th>
                    <th>Skor SAW</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $rank = 1; foreach($laptops as $laptop): ?>
                <tr>
                    <td>#<?php echo $rank++; ?></td>
                    <td>
                        <b><?php echo $laptop['brand']; ?></b><br>
                        <small><?php echo $laptop['model_name']; ?></small>
                    </td>
                    <td>Rp <?php echo number_format($laptop['price'], 0, ',', '.'); ?></td>
                    <td><?php echo $laptop['ram_gb']; ?> GB</td>
                    <td><?php echo $laptop['weight_kg']; ?> Kg</td>
                    <td><span class="score-badge"><?php echo number_format($laptop['skor_saw'], 4); ?></span></td>
                    <td>
                        <a href="index.php?controller=bookmark&action=simpan&id=<?php echo $laptop['id_laptop']; ?>" 
                        style="background:#ffc107; color:black; padding:5px 10px; text-decoration:none; border-radius:4px; font-size:12px;">
                        ★ Simpan
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

</body>
</html>