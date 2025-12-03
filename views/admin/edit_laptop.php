<?php require 'views/templates/header.php'; ?>

<div class="editorial-overlay" id="modal-overlay">
    
    <div class="editorial-modal">
        <div class="modal-meta">
            <span>EDIT MODE</span>
            <span>ID: #<?= $laptop['id_laptop']; ?></span>
        </div>

        <h2 class="modal-title">Edit Specs.</h2>
        <p class="modal-subtitle">
            Updating data for: <strong><?= htmlspecialchars($laptop['brand'] . ' ' . $laptop['model_name']); ?></strong>.
        </p>

        <form action="index.php?controller=admin&action=update&id=<?= $laptop['id_laptop']; ?>" method="POST">
            
            <div class="form-group">
                <label class="form-label" for="brand">Brand / Manufacturer</label>
                <input type="text" name="brand" id="brand" class="editorial-input" 
                       value="<?= htmlspecialchars($laptop['brand']); ?>" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="model_name">Model Name</label>
                <input type="text" name="model_name" id="model_name" class="editorial-input" 
                       value="<?= htmlspecialchars($laptop['model_name']); ?>" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="processor">Processor Unit</label>
                <input type="text" name="processor" id="processor" class="editorial-input" 
                       value="<?= htmlspecialchars($laptop['processor'] ?? ''); ?>" required>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label" for="price">Price (IDR)</label>
                    <input type="number" name="price" id="price" class="editorial-input" 
                           value="<?= htmlspecialchars($laptop['price']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="ram_gb">RAM (GB)</label>
                    <input type="number" name="ram_gb" id="ram_gb" class="editorial-input" 
                           value="<?= htmlspecialchars($laptop['ram_gb']); ?>" step="0.1" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="weight_kg">Weight (Kg)</label>
                    <input type="number" name="weight_kg" id="weight_kg" class="editorial-input" 
                           value="<?= htmlspecialchars($laptop['weight_kg']); ?>" step="0.01" required>
                </div>
            </div>

            <div style="margin-top: 30px;">
                <button type="submit" class="btn-editorial">
                    Update Specification
                </button>
                
                <a href="index.php?controller=admin&action=dashboard" class="btn-text-cancel">
                    Discard Changes
                </a>
            </div>
        </form>
    </div>
</div>

<?php require 'views/templates/footer.php'; ?>