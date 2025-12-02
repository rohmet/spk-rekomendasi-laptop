<?php require 'views/templates/header.php'; ?>

<div class="card-form">
    <div style="margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
        <h2>Edit Data Laptop</h2>
        <p style="color: #666;">Ubah spesifikasi laptop: <b><?= htmlspecialchars($laptop['model_name']); ?></b></p>
    </div>

    <form action="index.php?controller=admin&action=update&id=<?= $laptop['id_laptop']; ?>" method="POST">
        
        <div class="form-group">
            <label for="brand">Brand / Merek</label>
            <input type="text" name="brand" id="brand" class="form-control" 
                   value="<?= htmlspecialchars($laptop['brand']); ?>" required>
        </div>

        <div class="form-group">
            <label for="model_name">Nama Model / Tipe</label>
            <input type="text" name="model_name" id="model_name" class="form-control" 
                   value="<?= htmlspecialchars($laptop['model_name']); ?>" required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label for="price">Harga (Rp)</label>
                <input type="number" name="price" id="price" class="form-control" 
                       value="<?= htmlspecialchars($laptop['price']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="ram_gb">RAM (GB)</label>
                <input type="number" name="ram_gb" id="ram_gb" class="form-control" 
                       value="<?= htmlspecialchars($laptop['ram_gb']); ?>" step="0.1" required>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label for="weight_kg">Berat (Kg)</label>
                <input type="number" name="weight_kg" id="weight_kg" class="form-control" 
                       value="<?= htmlspecialchars($laptop['weight_kg']); ?>" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="processor">Processor</label>
                <input type="text" name="processor" id="processor" class="form-control" 
                       value="<?= htmlspecialchars($laptop['processor'] ?? ''); ?>" required>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary" style="padding: 10px 25px; font-size: 1rem;">
                <i class="fas fa-save"></i> Update Data
            </button>
            <a href="index.php?controller=admin&action=dashboard" class="btn btn-secondary" style="padding: 10px 25px; font-size: 1rem;">
                Batal
            </a>
        </div>
    </form>
</div>

<?php require 'views/templates/footer.php'; ?>