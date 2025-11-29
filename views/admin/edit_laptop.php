<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Laptop</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background: #f4f4f4; }
        .container { background: white; max-width: 600px; margin: auto; padding: 20px; border-radius: 8px; }
        h2 { text-align: center; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn-save { background: #ffc107; color: black; padding: 10px; width: 100%; border: none; cursor: pointer; font-weight: bold; }
        .btn-back { display: block; text-align: center; margin-top: 10px; text-decoration: none; color: #555; }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Data Laptop</h2>
    
    <form action="" method="POST">
        <div class="form-group">
            <label>Brand</label>
            <input type="text" name="brand" value="<?php echo $laptop['brand']; ?>" required>
        </div>
        <div class="form-group">
            <label>Model</label>
            <input type="text" name="model_name" value="<?php echo $laptop['model_name']; ?>" required>
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

        <hr>

        <div class="form-group"><label>Processor</label><input type="text" name="processor" value="<?php echo $laptop['processor']; ?>"></div>
        <div class="form-group"><label>GPU</label><input type="text" name="gpu" value="<?php echo $laptop['gpu']; ?>"></div>
        <div class="form-group"><label>Screen</label><input type="text" name="screen_resolution" value="<?php echo $laptop['screen_resolution']; ?>"></div>
        <div class="form-group"><label>Memory</label><input type="text" name="memory_type" value="<?php echo $laptop['memory_type']; ?>"></div>
        <div class="form-group"><label>OS</label><input type="text" name="os" value="<?php echo $laptop['os']; ?>"></div>

        <button type="submit" class="btn-save">Update Perubahan</button>
        <a href="dashboard.php" class="btn-back">Batal</a>
    </form>
</div>

</body>
</html>