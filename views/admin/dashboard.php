<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SPK Laptop</title>
    <style>
        body { font-family: sans-serif; margin: 0; display: flex; }
        .sidebar { width: 250px; background: #343a40; color: white; min-height: 100vh; padding: 20px; }
        .sidebar h3 { text-align: center; border-bottom: 1px solid #555; padding-bottom: 10px; }
        .sidebar a { display: block; color: #ddd; padding: 10px; text-decoration: none; margin-bottom: 5px; }
        .sidebar a:hover { background: #495057; color: white; }
        .content { flex: 1; padding: 20px; background: #f8f9fa; }
        table { width: 100%; border-collapse: collapse; background: white; margin-top: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #007bff; color: white; }
        .btn { padding: 5px 10px; text-decoration: none; border-radius: 4px; font-size: 14px; color: white; }
        .btn-edit { background-color: #ffc107; color: black; }
        .btn-delete { background-color: #dc3545; }
        .btn-add { background-color: #28a745; padding: 10px 15px; display: inline-block; }
    </style>
</head>
<body>

    <div class="sidebar">
        <h3>Admin Panel</h3>
        <p>Halo, <?php echo $_SESSION['username']; ?></p>
        <a href="dashboard.php">📍 Data Laptop</a>
        <a href="#">👤 Data User (Opsional)</a>
        <a href="logout.php" style="color: #ff6b6b;">🚪 Logout</a>
    </div>

    <div class="content">
        <h1>Kelola Data Laptop</h1>
        <p>Total Data di Database: 1.303 (Menampilkan 50 terbaru)</p>
        
        <a href="tambah_laptop.php" class="btn btn-add">+ Tambah Laptop Baru</a>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Brand & Model</th>
                    <th>Harga (Rp)</th>
                    <th>RAM</th>
                    <th>Berat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                if ($laptops && $laptops->num_rows > 0) {
                    while($row = $laptops->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td><b>" . $row['brand'] . "</b><br><small>" . $row['model_name'] . "</small></td>";
                        echo "<td>Rp " . number_format($row['price'], 0, ',', '.') . "</td>";
                        echo "<td>" . $row['ram_gb'] . " GB</td>";
                        echo "<td>" . $row['weight_kg'] . " Kg</td>";
                        echo "<td>
                                <a href='edit_laptop.php?id=".$row['id_laptop']."' class='btn btn-edit'>Edit</a>
                                <a href='hapus_laptop.php?id=".$row['id_laptop']."' class='btn btn-delete' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' style='text-align:center'>Belum ada data.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div style="margin-top: 20px; text-align: center;">
            <span style="margin-right: 15px;">
                Halaman <?php echo $page; ?> dari <?php echo $total_pages; ?> 
                (Total Data: <?php echo number_format($total_records); ?>)
            </span>

            <?php if($page > 1): ?>
                <a href="dashboard.php?page=<?php echo $page - 1; ?>" class="btn" style="background:#6c757d;">&laquo; Sebelumnya</a>
            <?php endif; ?>

            <?php if($page < $total_pages): ?>
                <a href="dashboard.php?page=<?php echo $page + 1; ?>" class="btn" style="background:#007bff;">Selanjutnya &raquo;</a>
            <?php endif; ?>
        </div>
        <br><br>
    </div>

</body>
</html>