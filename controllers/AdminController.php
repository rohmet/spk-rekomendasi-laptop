<?php
require_once 'models/Laptop.php';

class AdminController {
    private $laptopModel;

    public function __construct() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }
        $this->laptopModel = new Laptop();
    }

    public function index() {
        $limit = 15;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $start_from = ($page > 1) ? ($page * $limit) - $limit : 0;

        // Ambil data dari model
        $laptops = $this->laptopModel->getLaptopsPaginated($start_from, $limit);
        $total_records = $this->laptopModel->getTotalCount();
        $total_pages = ceil($total_records / $limit);

        require 'views/admin/dashboard.php';
    }

    public function create() {
        require 'views/admin/create_laptop.php';
    }

    public function store() {
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

            if ($this->laptopModel->insertLaptop($data)) {
                header("Location: index.php?controller=admin&action=index");
            } else {
                echo "<script>alert('Gagal menyimpan data'); window.history.back();</script>";
            }
        }
    }

    public function edit($id) {
        $laptop = $this->laptopModel->getLaptopById($id);
        if (!$laptop) {
            echo "Data tidak ditemukan!";
            exit;
        }
        require 'views/admin/edit_laptop.php';
    }

    public function update($id) {
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

            if ($this->laptopModel->updateLaptop($id, $data)) {
                header("Location: index.php?controller=admin&action=index");
            } else {
                echo "Gagal update data.";
            }
        }
    }
}