<?php include 'views/templates/header.php'; ?>

<section class="editorial-hero">
    <div class="container" style="padding-top: 0;">
        <h1 class="big-title">TECH<br>FINDER<span style="font-size:2rem; vertical-align:top;">TM</span></h1>
        <p class="hero-subtitle">
            "A modern algorithm designed to inform, filter, and recommend the best machines for your specific needs."
        </p>
    </div>
</section>

<div class="container">

    <form method="POST">
        <div class="control-panel">
            <div class="panel-header">
                <span><i class="fas fa-terminal"></i> SYSTEM_PREFERENCES_CONFIG</span>
                <span>V.2.0</span>
            </div>
            
            <div class="panel-body">
                <div class="brutal-range">
                    <label style="font-family: var(--font-sans); font-weight: bold; display: flex; justify-content: space-between;">
                        <span>PRIORITAS HARGA</span>
                        <span id="text_harga"><?php echo $b_harga; ?>%</span>
                    </label>
                    <input type="range" 
                        name="bobot_harga" 
                        class="live-slider" 
                        data-target="text_harga" 
                        min="0" max="100" 
                        value="<?php echo $b_harga; ?>">
                </div>

                <div class="brutal-range">
                    <label style="font-family: var(--font-sans); font-weight: bold; display: flex; justify-content: space-between;">
                        <span>PRIORITAS RAM</span>
                        <span id="text_ram"><?php echo $b_ram; ?>%</span>
                    </label>
                    <input type="range" 
                        name="bobot_ram" 
                        class="live-slider" 
                        data-target="text_ram" 
                        min="0" max="100" 
                        value="<?php echo $b_ram; ?>">
                </div>

                <div class="brutal-range">
                    <label style="font-family: var(--font-sans); font-weight: bold; display: flex; justify-content: space-between;">
                        <span>PRIORITAS BERAT</span>
                        <span id="text_berat"><?php echo $b_berat; ?>%</span>
                    </label>
                    <input type="range" 
                        name="bobot_berat" 
                        class="live-slider" 
                        data-target="text_berat" 
                        min="0" max="100" 
                        value="<?php echo $b_berat; ?>">
                </div>
            </div>

            <div style="border-top: 1px solid #000; padding: 20px; text-align: right; background: #fafafa;">
                <button type="submit" name="hitung" class="btn-brutal">
                    RUN ANALYSIS <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </form>

    <?php if($submitted && !empty($laptops)): ?>
        
        <div style="display: flex; align-items: baseline; justify-content: space-between; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #000;">
            <h2 style="font-size: 2.5rem; margin: 0;">Analysis Results</h2>
            <span style="font-family: var(--font-sans);">[ FOUND <?php echo count($laptops); ?> ENTRIES ]</span>
        </div>

        <div class="editorial-grid">
            <?php 
            $rank = 1;
            foreach($laptops as $laptop): 
                // Logika untuk menentukan label berdasarkan ranking
                $label = ($rank == 1) ? "EDITOR'S CHOICE" : "RECOMMENDED";
                $highlight_class = ($rank == 1) ? "highlight-text" : "";
            ?>
            
            <div class="window-card">
                <div class="window-header">
                    <div class="window-dots">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <span>NO. 00<?php echo $rank; ?></span>
                </div>

                <div class="window-visual">
                    <i class="fas fa-laptop" style="font-size: 4rem; color: #ccc;"></i>
                    <?php if($rank == 1): ?>
                        <div style="position: absolute; bottom: 10px; left: 10px; background: #000; color: #fff; padding: 5px 10px; font-family: var(--font-sans); font-size: 0.7rem; font-weight: bold;">
                            HIGHEST SCORE
                        </div>
                    <?php endif; ?>
                </div>

                <div>
                    <span class="meta-tag"><?php echo $label; ?> | <?php echo $laptop['brand']; ?></span>
                    <h3 class="card-title">
                        <span class="<?php echo $highlight_class; ?>">
                            <?php echo $laptop['model_name']; ?>
                        </span>
                    </h3>
                    <p style="font-family: var(--font-serif); font-size: 0.95rem; color: #444; margin-bottom: 20px;">
                        Unit ini memiliki skor kecocokan <strong><?php echo number_format($laptop['skor_saw'], 4); ?></strong>. 
                        Pilihan tepat untuk budget Rp <?php echo number_format($laptop['price'], 0, ',', '.'); ?>.
                    </p>
                </div>

                <div class="specs-list">
                    <span><i class="fas fa-memory"></i> <?php echo $laptop['ram_gb']; ?> GB</span>
                    <span><i class="fas fa-hdd"></i> SSD</span>
                    <span><i class="fas fa-weight-hanging"></i> Ringan</span>
                </div>
            </div>

            <?php $rank++; endforeach; ?>
        </div>

    <?php endif; ?>

    <div style="height: 100px;"></div>
</div>

<?php include 'views/templates/footer.php'; ?>