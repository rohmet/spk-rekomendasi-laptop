<?php require 'views/templates/header.php'; ?>

<div class="card-form">
    <div style="margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
        <h2>Tambah Data Laptop</h2>
        <p style="color: #666;">Masukkan spesifikasi laptop baru untuk dianalisis.</p>
    </div>

    <form action="index.php?controller=admin&action=store" method="POST">
        
        <div class="form-group">
            <label for="brand">Brand / Merek</label>
            <input type="text" name="brand" id="brand" class="form-control" placeholder="Contoh: Asus, Lenovo, HP" required>
        </div>

        <div class="form-group">
            <label for="model_name">Nama Model / Tipe</label>
            <input type="text" name="model_name" id="model_name" class="form-control" placeholder="Contoh: ROG Zephyrus G14" required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label for="price">Harga (Rp)</label>
                <input type="number" name="price" id="price" class="form-control" placeholder="Contoh: 15000000" required>
            </div>
            
            <div class="form-group">
                <label for="ram_gb">RAM (GB)</label>
                <input type="number" name="ram_gb" id="ram_gb" class="form-control" placeholder="Contoh: 8, 16" step="0.1" required>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label for="weight_kg">Berat (Kg)</label>
                <input type="number" name="weight_kg" id="weight_kg" class="form-control" placeholder="Contoh: 1.5" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="processor">Processor</label>
                <input type="text" name="processor" id="processor" class="form-control" placeholder="Contoh: Intel Core i7 / AMD Ryzen 5" required>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary" style="padding: 10px 25px; font-size: 1rem;">
                <i class="fas fa-save"></i> Simpan Data
            </button>
            <a href="index.php?controller=admin&action=dashboard" class="btn btn-secondary" style="padding: 10px 25px; font-size: 1rem;">
                Batal
            </a>
        </div>
    </form>
</div>

<?php require 'views/templates/footer.php'; ?>