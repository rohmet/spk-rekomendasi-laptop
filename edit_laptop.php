<?php
session_start();
require_once 'models/Laptop.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$laptopModel = new Laptop();
$id_laptop = $_GET['id'];
$laptop = $laptopModel->getLaptopById($id_laptop);

if (!$laptop) {
    echo "Data tidak ditemukan!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'brand' => $_POST['brand'],
        'model_name' => $_POST['model_name'],
        'price' => $_POST['price'],
        'ram_gb' => $_POST['ram_gb'],
        'weight_kg' => $_POST['weight_kg'],
        'processor' => $_POST['processor'],
        'gpu' => $_POST['gpu'],
        'screen_resolution' => $_POST['screen_resolution'],
        'memory_type' => $_POST['memory_type'],
        'os' => $_POST['os']
    ];

    if ($laptopModel->updateLaptop($id_laptop, $data)) {
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Gagal mengupdate data.";
    }
}
?>

<?php require 'views/admin/edit_laptop.php'; ?>