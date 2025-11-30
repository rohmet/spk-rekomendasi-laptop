<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Laptop - Admin</title>
    <style>
        /* (Style sama seperti sebelumnya, boleh dicopy dari tambah_laptop.php) */
        body { font-family: sans-serif; padding: 20px; background: #f4f4f4; }
        .container { background: white; max-width: 600px; margin: auto; padding: 20px; border-radius: 8px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ddd; }
        .btn-save { background: #28a745; color: white; padding: 10px; width: 100%; border: none; cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <h2 style="text-align:center">Tambah Laptop Baru</h2>
    
    <form action="index.php?controller=admin&action=store" method="POST">
        
        <div class="form-group"><label>Brand</label><input type="text" name="brand" required></div>
        <div class="form-group"><label>Model</label><input type="text" name="model_name" required></div>
        <div class="form-group"><label>Harga</label><input type="number" name="price" required></div>
        <div class="form-group"><label>RAM (GB)</label><input type="number" name="ram_gb" required></div>
        <div class="form-group"><label>Berat (Kg)</label><input type="number" step="0.01" name="weight_kg" required></div>
        
        <hr>
        <div class="form-group"><label>Processor</label><input type="text" name="processor"></div>
        <div class="form-group"><label>GPU</label><input type="text" name="gpu"></div>
        <div class="form-group"><label>Resolusi</label><input type="text" name="screen_resolution"></div>
        <div class="form-group"><label>Tipe Memori</label><input type="text" name="memory_type"></div>
        <div class="form-group"><label>OS</label><input type="text" name="os"></div>

        <button type="submit" class="btn-save">Simpan Data</button>
        <br><br>
        <a href="index.php?controller=admin&action=index" style="display:block;text-align:center">Batal</a>
    </form>
</div>
</body>
</html>