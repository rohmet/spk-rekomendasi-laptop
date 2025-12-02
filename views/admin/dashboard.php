<?php 
// 1. Panggil Header
require 'views/templates/header.php'; 
?>

<div class="page-header">
    <div>
        <h2>Kelola Data Laptop</h2>
        <p class="header-meta">
            Total Data: <b><?= isset($total_records) ? number_format($total_records) : 0; ?></b> laptop.
        </p>
    </div>
    <a href="index.php?controller=admin&action=create" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Unit Baru
    </a>
</div>

<?php if (isset($_GET['msg'])): ?>
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i> <?= htmlspecialchars($_GET['msg']); ?>
    </div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Unit Laptop</th>
                <th width="20%">Spesifikasi</th>
                <th width="15%">Processor</th>
                <th width="20%">Harga</th>
                <th width="15%" style="text-align: right;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = isset($start_from) ? $start_from + 1 : 1; 
            ?>

            <?php if (!empty($laptops)): ?>
                <?php foreach ($laptops as $laptop): ?>
                <tr>
                    <td><span class="table-no"><?= $no++; ?></span></td>
                    <td>
                        <span class="data-primary"><?= htmlspecialchars($laptop['brand']); ?></span>
                        <span class="data-secondary"><?= htmlspecialchars($laptop['model_name']); ?></span>
                    </td>
                    <td>
                        <div class="spec-detail">
                            <i class="fas fa-memory spec-icon"></i> <?= htmlspecialchars($laptop['ram_gb']); ?> GB RAM<br>
                            <div style="height: 4px;"></div> <i class="fas fa-weight-hanging spec-icon"></i> <?= htmlspecialchars($laptop['weight_kg']); ?> Kg
                        </div>
                    </td>
                    <td>
                        <span style="font-size: 14px; font-weight: 500;"><?= htmlspecialchars($laptop['processor']); ?></span>
                    </td>
                    <td>
                        <span class="price-tag">
                            Rp <?= number_format($laptop['price'], 0, ',', '.'); ?>
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="index.php?controller=admin&action=edit&id=<?= $laptop['id_laptop']; ?>" 
                            class="btn-action btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <a href="index.php?controller=admin&action=delete&id=<?= $laptop['id_laptop']; ?>" 
                            class="btn-action btn-delete"
                            onclick="return confirm('Yakin ingin menghapus data <?= htmlspecialchars($laptop['model_name']); ?>?')">
                            <i class="fas fa-trash"></i> Hapus
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="empty-state">
                        Belum ada data laptop. Silakan tambah data baru.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php if (isset($total_pages) && $total_pages > 1): ?>
<div class="pagination-container">
    
    <?php if ($page > 1): ?>
        <a href="index.php?controller=admin&action=index&page=<?= $page - 1; ?>" class="btn btn-sm btn-secondary">
            &laquo; Sebelumnya
        </a>
    <?php endif; ?>

    <span class="pagination-info">
        Halaman <?= $page; ?> dari <?= $total_pages; ?>
    </span>

    <?php if ($page < $total_pages): ?>
        <a href="index.php?controller=admin&action=index&page=<?= $page + 1; ?>" class="btn btn-sm btn-primary">
            Selanjutnya &raquo;
        </a>
    <?php endif; ?>

</div>
<?php endif; ?>

<?php 
// 2. Panggil Footer
require 'views/templates/footer.php'; 
?>