<?php
session_start();

// 1. Cek Keamanan (Middleware Sederhana)
// Jika belum login ATAU bukan admin, tendang ke login
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// 2. Panggil Data Laptop
require_once 'models/Laptop.php';
$laptopModel = new Laptop();
$laptops = $laptopModel->getAll();

require 'views/admin/dashboard.php';
?>