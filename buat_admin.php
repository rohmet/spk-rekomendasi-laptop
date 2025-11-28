<?php
require_once 'config/database.php';

$db = new Database();
$conn = $db->getConnection();

$username = "admin";
$password = "hitam";
$password_hash = password_hash($password, PASSWORD_DEFAULT);
$role = "admin";

// Query Simpan
$query = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sss", $username, $password_hash, $role);

if($stmt->execute()){
    echo "Sukses! Akun admin berhasil dibuat.<br>";
    echo "Username: <b>admin</b><br>";
    echo "Password: <b>hitam</b><br>";
    echo "Silakan hapus file buat_admin.php ini setelah selesai.";
} else {
    echo "Gagal: " . $conn->error;
}
?>