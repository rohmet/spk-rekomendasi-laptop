<?php include 'views/templates/header.php'; ?>

<div class="container">
    <div style="border-bottom: 1px solid #000; margin-bottom: 40px; padding-bottom: 20px; display: flex; justify-content: space-between; align-items: flex-end;">
        <div>
            <span style="font-family: var(--font-sans); font-size: 0.8rem; letter-spacing: 2px; text-transform: uppercase; color: #888;">My Collection</span>
            <h1 style="font-family: var(--font-serif); font-size: 2.5rem; margin: 10px 0 0 0;">Wishlist.</h1>
        </div>
        <a href="index.php" class="btn-editorial" style="width: auto; padding: 10px 20px; margin: 0;">
            &larr; Browse More
        </a>
    </div>

    <div class="editorial-grid">
        <?php if ($favorites->num_rows > 0): ?>
            <?php while($row = $favorites->fetch_assoc()): ?>
                
                <div class="window-card">
                    <div class="window-header">
                        <div class="window-dots">
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                        <span style="font-size: 0.7rem; font-family: monospace;">SAVED_ITEM</span>
                    </div>

                    <div class="window-visual">
                         <i class="fas fa-heart" style="font-size: 3rem; color: #000;"></i>
                    </div>

                    <div style="flex-grow: 1; display: flex; flex-direction: column;">
                        <span class="meta-tag"><?php echo $row['brand']; ?></span>
                        <h3 class="card-title"><?php echo $row['model_name']; ?></h3>
                        
                        <div class="specs-list" style="margin-top: auto; border-top: 1px solid #eee; padding-top: 15px; margin-bottom: 15px;">
                            <span><i class="fas fa-memory"></i> <?php echo $row['ram_gb']; ?> GB</span>
                            <span class="table-price">Rp <?php echo number_format($row['price'], 0, ',', '.'); ?></span>
                        </div>

                        <a href="index.php?controller=bookmark&action=delete&id=<?php echo $row['id_bookmark']; ?>" 
                            class="btn-remove-card btn-confirm-delete"
                            data-message="Hapus laptop ini dari koleksi favorit Anda?">
                            <i class="fas fa-times"></i> Remove Item
                        </a>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php else: ?>
            <div style="grid-column: 1 / -1; text-align: center; padding: 60px; border: 1px dashed #ccc; background: #fafafa;">
                <i class="far fa-folder-open" style="font-size: 3rem; color: #ccc; margin-bottom: 20px;"></i>
                <h3 style="font-family: var(--font-serif);">Your collection is empty.</h3>
                <p style="color: #888;">Start exploring and save your favorite machines here.</p>
                <a href="index.php" style="text-decoration: underline; font-weight: bold; color: #000;">Go to Recommendation</a>
            </div>
        <?php endif; ?>
    </div>
    
    <div style="height: 100px;"></div>
</div>

<?php include 'views/templates/footer.php'; ?>