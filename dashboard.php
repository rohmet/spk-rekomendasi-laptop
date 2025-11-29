<?php
session_start();

// Cek Keamanan (Middleware Sederhana)
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

require_once 'models/Laptop.php';
$laptopModel = new Laptop();

$limit = 15;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_from = ($page > 1) ? ($page * $limit) - $limit : 0;

// Ambil Data
$laptops = $laptopModel->getLaptopsPaginated($start_from, $limit);
$total_records = $laptopModel->getTotalCount();
$total_pages = ceil($total_records / $limit);

require 'views/admin/dashboard.php';
?>