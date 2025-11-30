<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SPK Laptop</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; display: flex; background-color: #f4f6f9; }
        
        /* Sidebar Style */
        .sidebar { width: 250px; background: #343a40; color: white; min-height: 100vh; padding: 20px; display: flex; flex-direction: column; }
        .sidebar h3 { text-align: center; border-bottom: 1px solid #4b545c; padding-bottom: 15px; margin-bottom: 20px; }
        .sidebar a { display: block; color: #c2c7d0; padding: 12px; text-decoration: none; margin-bottom: 5px; border-radius: 4px; transition: 0.3s; }
        .sidebar a:hover { background: #495057; color: white; }
        .sidebar .active { background: #007bff; color: white; }
        
        /* Content Style */
        .content { flex: 1; padding: 30px; }
        .card { background: white; border-radius: 8px; box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2); padding: 20px; }
        
        /* Table Style */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #dee2e6; }
        th { background-color: #f8f9fa; color: #212529; font-weight: bold; border-top: 1px solid #dee2e6; }
        tr:hover { background-color: #f1f1f1; }
        
        /* Buttons */
        .btn { padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 14px; color: white; display: inline-block; }
        .btn-add { background-color: #28a745; padding: 10px 20px; font-size: 16px; margin-bottom: 15px; }
        .btn-add:hover { background-color: #218838; }
        .btn-edit { background-color: #ffc107; color: black; }
        .btn-edit:hover { background-color: #e0a800; }
        .btn-delete { background-color: #dc3545; }
        .btn-delete:hover { background-color: #c82333; }
        
        .pagination { margin-top: 20px; text-align: center; }
        .page-info { display: inline-block; margin: 0 15px; font-weight: bold; color: #555; }
    </style>
</head>
<body>

    <div class="sidebar">
        <h3>Admin Panel</h3>
        <p style="text-align:center; color:#bbb; font-size:14px;">
            Halo, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin'; ?>
        </p>
        
        <a href="index.php?controller=admin&action=index" class="active">📍 Data Laptop</a>
        
        <a href="#">👤 Data User (Opsional)</a>
        
        <a href="index.php?controller=auth&action=logout" style="color: #ff6b6b; margin-top:auto;">🚪 Logout</a>
    </div>

    <div class="content">
        <div class="card">
            <h1 style="margin-top:0;">Kelola Data Laptop</h1>
            <p style="color:#666;">
                Total Data: <b><?php echo number_format($total_records); ?></b> laptop.
            </p>
            
            <a href="index.php?controller=admin&action=create" class="btn btn-add">+ Tambah Laptop Baru</a>

            <table>
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="35%">Brand & Model</th>
                        <th width="20%">Harga (Rp)</th>
                        <th width="10%">RAM</th>
                        <th width="10%">Berat</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Menghitung nomor urut berdasarkan halaman (untuk tampilan saja)
                    $no = isset($start_from) ? $start_from + 1 : 1; 

                    if ($laptops && $laptops->num_rows > 0) {
                        while($row = $laptops->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td><b>" . htmlspecialchars($row['brand']) . "</b><br><small style='color:#666;'>" . htmlspecialchars($row['model_name']) . "</small></td>";
                            echo "<td>Rp " . number_format($row['price'], 0, ',', '.') . "</td>";
                            echo "<td>" . $row['ram_gb'] . " GB</td>";
                            echo "<td>" . $row['weight_kg'] . " Kg</td>";
                            echo "<td>";
                            
                            // Link Edit (Ke AdminController)
                            echo "<a href=\"index.php?controller=admin&action=edit&id=" . $row['id_laptop'] . "\" class='btn btn-edit' style='margin-right:5px;'>Edit</a>";
                            
                            // Link Hapus (Ke LaptopController karena method delete ada disana)
                            echo "<a href=\"index.php?controller=laptop&action=delete&id=" . $row['id_laptop'] . "\" class='btn btn-delete' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>";
                            
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' style='text-align:center; padding:30px;'>Belum ada data laptop. Silakan tambah data baru.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <div class="pagination">
                <?php if($page > 1): ?>
                    <a href="index.php?controller=admin&action=index&page=<?php echo $page-1; ?>" class="btn" style="background:#6c757d;">&laquo; Sebelumnya</a>
                <?php endif; ?>

                <span class="page-info">
                    Halaman <?php echo $page; ?> dari <?php echo $total_pages; ?>
                </span>

                <?php if($page < $total_pages): ?>
                    <a href="index.php?controller=admin&action=index&page=<?php echo $page + 1; ?>" class="btn" style="background:#007bff;">Selanjutnya &raquo;</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>
</html>