<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Laptop</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; padding: 20px; background: #f4f6f9; }
        .container { background: white; max-width: 600px; margin: auto; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; margin-bottom: 25px; color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; color: #555; }
        input { width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        
        /* Tombol Update */
        .btn-save { background: #ffc107; color: black; padding: 12px; width: 100%; border: none; cursor: pointer; font-weight: bold; font-size: 16px; border-radius: 4px; transition: 0.3s; }
        .btn-save:hover { background: #e0a800; }
        
        /* Tombol Batal */
        .btn-back { display: block; text-align: center; margin-top: 15px; text-decoration: none; color: #666; }
        .btn-back:hover { color: #333; text-decoration: underline; }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Data Laptop</h2>
    
    <form action="index.php?controller=admin&action=update&id=<?php echo $laptop['id_laptop']; ?>" method="POST">
        
        <div class="form-group">
            <label>Brand</label>
            <input type="text" name="brand" value="<?php echo htmlspecialchars($laptop['brand']); ?>" required>
        </div>
        <div class="form-group">
            <label>Model</label>
            <input type="text" name="model_name" value="<?php echo htmlspecialchars($laptop['model_name']); ?>" required>
        </div>
        <div class="form-group">
            <label>Harga (Rp)</label>
            <input type="number" name="price" value="<?php echo $laptop['price']; ?>" required>
        </div>
        <div class="form-group">
            <label>RAM (GB)</label>
            <input type="number" name="ram_gb" value="<?php echo $laptop['ram_gb']; ?>" required>
        </div>
        <div class="form-group">
            <label>Berat (Kg)</label>
            <input type="number" step="0.01" name="weight_kg" value="<?php echo $laptop['weight_kg']; ?>" required>
        </div>

        <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">

        <div class="form-group">
            <label>Processor</label>
            <input type="text" name="processor" value="<?php echo htmlspecialchars($laptop['processor']); ?>">
        </div>
        <div class="form-group">
            <label>GPU / VGA</label>
            <input type="text" name="gpu" value="<?php echo htmlspecialchars($laptop['gpu']); ?>">
        </div>
        <div class="form-group">
            <label>Resolusi Layar</label>
            <input type="text" name="screen_resolution" value="<?php echo htmlspecialchars($laptop['screen_resolution']); ?>">
        </div>
        <div class="form-group">
            <label>Tipe Memori</label>
            <input type="text" name="memory_type" value="<?php echo htmlspecialchars($laptop['memory_type']); ?>">
        </div>
        <div class="form-group">
            <label>Sistem Operasi</label>
            <input type="text" name="os" value="<?php echo htmlspecialchars($laptop['os']); ?>">
        </div>

        <button type="submit" class="btn-save">Update Perubahan</button>
        
        <a href="index.php?controller=admin&action=index" class="btn-back">Batal</a>
    </form>
</div>

</body>
</html>