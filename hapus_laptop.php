<?php
session_start();
require_once 'models/Laptop.php';

// Cek Login Admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Cek apakah ada ID di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $laptopModel = new Laptop();
    if ($laptopModel->deleteLaptop($id)) {
        header("Location: dashboard.php");
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    header("Location: dashboard.php");
}
?>