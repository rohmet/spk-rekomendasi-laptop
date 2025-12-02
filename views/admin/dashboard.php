<?php 
// 1. Panggil Header (Memuat Navbar & CSS)
require 'views/templates/header.php'; 
?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <div>
        <h2>Kelola Data Laptop</h2>
        <p style="color: #666; font-size: 0.9rem; margin-top: 5px;">
            Total Data: <b><?= isset($total_records) ? number_format($total_records) : 0; ?></b> laptop.
        </p>
    </div>
    <a href="index.php?controller=admin&action=create" class="btn btn-primary">
        <i class="fas fa-plus"></i> + Tambah Laptop
    </a>
</div>

<?php if (isset($_GET['msg'])): ?>
    <div style="background: #d4edda; color: #155724; padding: 12px; margin-bottom: 20px; border-radius: 6px; border: 1px solid #c3e6cb;">
        <i class="fas fa-check-circle"></i> <?= htmlspecialchars($_GET['msg']); ?>
    </div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">Brand & Model</th>
                <th width="20%">Harga (Rp)</th>
                <th width="10%">RAM</th>
                <th width="15%">Berat</th>
                <th width="20%">Processor</th>
                <th width="20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Menghitung nomor urut (jika ada pagination, jika tidak mulai dari 1)
            $no = isset($start_from) ? $start_from + 1 : 1; 
            ?>

            <?php if (!empty($laptops)): ?>
                <?php foreach ($laptops as $laptop): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>
                        <span style="font-weight: bold; font-size: 1rem;">
                            <?= htmlspecialchars($laptop['brand']); ?>
                        </span>
                        <br>
                        <small style="color: #666;">
                            <?= htmlspecialchars($laptop['model_name']); ?>
                        </small>
                    </td>
                    <td>
                        Rp <?= number_format($laptop['price'], 0, ',', '.'); ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($laptop['ram_gb']); ?> GB
                    </td>
                    <td>
                        <?= htmlspecialchars($laptop['weight_kg']); ?> Kg
                    </td>
                    <td>
                        <?= htmlspecialchars($laptop['processor']); ?>
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
                    <td colspan="7" style="text-align: center; padding: 30px; color: #888;">
                        Belum ada data laptop. Silakan tambah data baru.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php if (isset($total_pages) && $total_pages > 1): ?>
<div style="margin-top: 20px; display: flex; justify-content: center; gap: 10px;">
    
    <?php if ($page > 1): ?>
        <a href="index.php?controller=admin&action=index&page=<?= $page - 1; ?>" class="btn btn-sm btn-primary" style="background: #6c757d;">
            &laquo; Sebelumnya
        </a>
    <?php endif; ?>

    <span style="padding: 5px 15px; background: #eee; border-radius: 4px; display: flex; align-items: center;">
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