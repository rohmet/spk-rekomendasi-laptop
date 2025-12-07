<?php include 'views/templates/header.php'; ?>

<section class="editorial-hero">
    <div class="container" style="padding-top: 110px;">
        <h1 class="big-title">LAPTOP<br>FINDER<span style="font-size:2rem; vertical-align:top;">TM</span></h1>
        <p class="hero-subtitle">
            "Temukan laptop terbaik sesuai kebutuhan, budget, performa, dan berat."
        </p>
    </div>
</section>

<div class="container">

    <form method="POST">
        <div class="control-panel mb-5">
            <div class="panel-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-terminal"></i> SYSTEM_PREFERENCES_CONFIG</span>
            </div>
            
            <div class="panel-body">
                <div class="row g-4"> <div class="col-md-4">
                        <div class="brutal-range">
                            <label class="d-flex justify-content-between fw-bold mb-2" style="font-family: var(--font-sans);">
                                <span>PRIORITAS HARGA</span>
                                <span id="text_harga" class="badge bg-black rounded-0"><?php echo $b_harga; ?>%</span>
                            </label>
                            <input type="range" 
                                name="bobot_harga" 
                                class="form-range live-slider" 
                                data-target="text_harga" 
                                min="0" max="100" 
                                value="<?php echo $b_harga; ?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="brutal-range">
                            <label class="d-flex justify-content-between fw-bold mb-2" style="font-family: var(--font-sans);">
                                <span>PRIORITAS RAM</span>
                                <span id="text_ram" class="badge bg-black rounded-0"><?php echo $b_ram; ?>%</span>
                            </label>
                            <input type="range" 
                                name="bobot_ram" 
                                class="form-range live-slider" 
                                data-target="text_ram" 
                                min="0" max="100" 
                                value="<?php echo $b_ram; ?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="brutal-range">
                            <label class="d-flex justify-content-between fw-bold mb-2" style="font-family: var(--font-sans);">
                                <span>PRIORITAS BERAT</span>
                                <span id="text_berat" class="badge bg-black rounded-0"><?php echo $b_berat; ?>%</span>
                            </label>
                            <input type="range" 
                                name="bobot_berat" 
                                class="form-range live-slider" 
                                data-target="text_berat" 
                                min="0" max="100" 
                                value="<?php echo $b_berat; ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div style="border-top: 1px solid #000; padding: 20px; text-align: right; background: #fafafa;">
                <button type="submit" name="hitung" class="btn-brutal">
                    RUN ANALYSIS <i class="fas fa-arrow-right ms-2"></i>
                </button>
            </div>
        </div>
    </form>

    <?php if($submitted): ?>
        
        <?php if(!empty($laptops)): ?>
            <div class="d-flex align-items-baseline justify-content-between border-bottom border-dark border-2 mb-4 pb-2">
                <h2 style="font-size: 2.5rem; margin: 0;">Analysis Results</h2>
                <span style="font-family: var(--font-sans);">[ FOUND <?php echo count($laptops); ?> ENTRIES ]</span>
            </div>

            <div class="editorial-grid">
                <?php 
                $rank = 1;
                foreach($laptops as $laptop): 
                    $label = ($rank == 1) ? "EDITOR'S CHOICE" : "RECOMMENDED";
                    $highlight_class = ($rank == 1) ? "highlight-text" : "";
                ?>
                
                <div class="window-card d-flex flex-column h-100"> <div class="window-header">
                        <div class="window-dots">
                            <div class="dot"></div><div class="dot"></div><div class="dot"></div>
                        </div>
                        <span class="small fw-bold">RANK #0<?php echo $rank; ?></span>
                        
                        <a href="index.php?controller=bookmark&action=simpan&id=<?= $laptop['id_laptop']; ?>" 
                           class="btn-icon-love text-danger" 
                           data-bs-toggle="tooltip" title="Simpan ke Favorit">
                            <i class="far fa-heart"></i>
                        </a>
                    </div>
                    
                    <div class="flex-grow-1"> <span class="meta-tag mb-2 d-inline-block"><?php echo $label; ?> | <?php echo $laptop['brand']; ?></span>
                        <h3 class="card-title mb-3">
                            <span class="<?php echo $highlight_class; ?>">
                                <?php echo $laptop['model_name']; ?>
                            </span>
                        </h3>

                        <div class="d-flex gap-2 mb-4">
                            <span class="badge badge-score">
                                Skor: <?php echo number_format($laptop['skor_saw'] * 100, 1); ?>%
                            </span>
                            <span class="badge badge-price">
                                IDR <?php echo number_format($laptop['price'], 0, ',', '.'); ?> JT
                            </span>
                        </div>

                        <p style="font-family: var(--font-serif); font-size: 0.95rem; color: #444; margin-bottom: 20px;">
                            Processor laptop <strong><?php echo htmlspecialchars($laptop['processor']); ?></strong>.
                        </p>
                    </div>
                    
                    <div class="specs-list d-flex justify-content-between border-top pt-3 mt-3 text-muted small">
                        <span><i class="fas fa-memory me-1"></i> <?php echo $laptop['ram_gb']; ?> GB</span>
                        <span><i class="fas fa-hdd me-1"></i> <?php echo $laptop['memory_type']; ?></span>
                        <span><i class="fas fa-weight-hanging me-1"></i> <?php echo $laptop['weight_kg']; ?> Kg</span>
                    </div>
                </div>

                <?php $rank++; endforeach; ?>
            </div>

        <?php else: ?>
            <div class="alert alert-warning border-0 shadow-sm d-flex align-items-center mt-4" role="alert">
                <i class="fas fa-exclamation-triangle fa-2x me-3"></i>
                <div>
                    <h5 class="alert-heading fw-bold mb-1">Hasil Tidak Ditemukan</h5>
                    <p class="mb-0">Tidak ada laptop yang sesuai dengan kombinasi filter ini. Coba turunkan prioritas Harga atau Berat.</p>
                </div>
            </div>
        <?php endif; ?>

    <?php endif; ?>

    <div style="height: 100px;"></div>
</div>

<?php include 'views/templates/footer.php'; ?>