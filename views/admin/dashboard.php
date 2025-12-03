<?php 
// 1. Panggil Header
require 'views/templates/header.php'; 
?>

<div class="container">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; border-bottom: 1px solid #000; padding-bottom: 20px;">
        <div>
            <span style="font-family: var(--font-sans); font-size: 0.8rem; letter-spacing: 2px; text-transform: uppercase; color: #888;">Admin Control</span>
            <h2 style="font-family: var(--font-serif); font-size: 2rem; margin: 5px 0;">Data Inventory.</h2>
            <p class="header-meta" style="margin: 0; color: #666;">
                Total Database: <b><?= isset($total_records) ? number_format($total_records) : 0; ?></b> units registered.
            </p>
        </div>
        <a href="index.php?controller=admin&action=create" class="btn-editorial" style="width: auto; padding: 12px 25px;">
            <i class="fas fa-plus"></i> Add New Unit
        </a>
    </div>

    <?php if (isset($_GET['msg'])): ?>
        <div class="editorial-alert" style="border-left-color: #28a745; color: #155724; background: #d4edda; margin-bottom: 30px;">
            <i class="fas fa-check-circle"></i> <?= htmlspecialchars($_GET['msg']); ?>
        </div>
    <?php endif; ?>

    <div class="editorial-table-container">
        <table class="editorial-table">
            <thead>
                <tr>
                    <th width="5%">No.</th>
                    <th width="30%">Unit Information</th>
                    <th width="20%">Key Specs</th>
                    <th width="20%">Processor</th>
                    <th width="15%">Market Price</th>
                    <th width="10%" style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = isset($start_from) ? $start_from + 1 : 1; 
                ?>

                <?php if (!empty($laptops)): ?>
                    <?php foreach ($laptops as $laptop): ?>
                    <tr>
                        <td style="font-family: monospace; color: #888;">0<?php echo $no++; ?></td>
                        <td>
                            <span class="table-title"><?= htmlspecialchars($laptop['brand']); ?></span>
                            <span class="table-subtitle"><?= htmlspecialchars($laptop['model_name']); ?></span>
                        </td>
                        <td>
                            <div style="font-size: 0.85rem; color: #555;">
                                <div><i class="fas fa-memory" style="width:15px;"></i> <?= htmlspecialchars($laptop['ram_gb']); ?> GB RAM</div>
                                <div style="margin-top:4px;"><i class="fas fa-weight-hanging" style="width:15px;"></i> <?= htmlspecialchars($laptop['weight_kg']); ?> Kg</div>
                            </div>
                        </td>
                        <td style="font-family: monospace; font-size: 0.85rem;">
                            <?= htmlspecialchars($laptop['processor']); ?>
                        </td>
                        <td>
                            <span class="table-price">
                                Rp <?= number_format($laptop['price'], 0, ',', '.'); ?>
                            </span>
                        </td>
                        <td style="text-align: right;">
                            <a href="index.php?controller=admin&action=edit&id=<?= $laptop['id_laptop']; ?>" 
                               class="btn-icon" title="Edit Data">
                                <i class="fas fa-pen"></i>
                            </a>

                            <a href="index.php?controller=admin&action=delete&id=<?= $laptop['id_laptop']; ?>" 
                                class="btn-icon delete btn-confirm-delete" 
                                data-message="Apakah Anda yakin ingin menghapus data <?= htmlspecialchars($laptop['model_name']); ?> secara permanen?">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 40px; color: #999;">
                            Database is currently empty.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if (isset($total_pages) && $total_pages > 1): ?>
    <div class="pagination-container" style="margin-top: 30px; display: flex; justify-content: center; align-items: center; gap: 20px;">
        
        <?php if ($page > 1): ?>
            <a href="index.php?controller=admin&action=index&page=<?= $page - 1; ?>" style="text-decoration: underline;">
                &laquo; Previous
            </a>
        <?php endif; ?>

        <span style="font-family: monospace; border: 1px solid #000; padding: 5px 15px;">
            PAGE <?= $page; ?> / <?= $total_pages; ?>
        </span>

        <?php if ($page < $total_pages): ?>
            <a href="index.php?controller=admin&action=index&page=<?= $page + 1; ?>" style="text-decoration: underline;">
                Next &raquo;
            </a>
        <?php endif; ?>

    </div>
    <?php endif; ?>

    <div style="height: 50px;"></div>
</div>

<?php 
// 2. Panggil Footer
require 'views/templates/footer.php'; 
?>