<?php require 'views/templates/header.php'; ?>

<div class="editorial-overlay" id="modal-overlay">
    
    <div class="editorial-modal">
        <div class="modal-meta">
            <span>ENTRY FORM</span>
            <span><?php echo date('d.m.Y'); ?></span>
        </div>

        <h2 class="modal-title">Laptop baru.</h2>
        <p class="modal-subtitle">Tambahkan mesin baru ke database. Pastikan semua spesifikasi akurat.</p>

        <form action="index.php?controller=admin&action=store" method="POST">
            
            <div class="form-group">
                <label class="form-label" for="brand">Brand / Manufacturer</label>
                <input type="text" name="brand" id="brand" class="editorial-input" placeholder="e.g. Apple, ASUS, Lenovo" required autofocus>
            </div>

            <div class="form-group">
                <label class="form-label" for="model_name">Model Name</label>
                <input type="text" name="model_name" id="model_name" class="editorial-input" placeholder="e.g. MacBook Air M2" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="processor">Processor Unit</label>
                <input type="text" name="processor" id="processor" class="editorial-input" placeholder="e.g. Intel Core i7 / M2 Chip" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label">HARGA (IDR)</label>
                    <input type="number" name="price" class="form-control" style="border:none; border-bottom:1px solid #000; border-radius:0;">
                </div>
                <div class="col-md-3 mb-4">
                    <label class="form-label">RAM (GB)</label>
                    <input type="number" name="ram_gb" class="form-control" ...>
                </div>
                <div class="col-md-3 mb-4">
                    <label class="form-label">BERAT (KG)</label>
                    <input type="number" name="weight_kg" class="form-control" ...>
                </div>
            </div>

            <div style="margin-top: 30px;">
                <button type="submit" class="btn-editorial">
                    Simpan Konfigurasi
                </button>
                
                <a href="index.php?controller=admin&action=dashboard" class="btn-text-cancel">
                    Batal & Kembali ke Dashboard
                </a>
            </div>
        </form>
    </div>
</div>

<?php require 'views/templates/footer.php'; ?>