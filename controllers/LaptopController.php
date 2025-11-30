<?php
require_once 'models/Laptop.php';

class LaptopController {
    private $model;

    public function __construct() {
        $this->model = new Laptop();
    }

    // Menangani Halaman Utama & Rekomendasi (Pindahan dari index.php)
    public function index() {
        $laptops = [];
        $submitted = false;
        
        // Default bobot
        $b_harga = 30;
        $b_ram = 30;
        $b_berat = 40;

        if (isset($_POST['hitung'])) {
            $submitted = true;
            $b_harga = $_POST['bobot_harga'];
            $b_ram   = $_POST['bobot_ram'];
            $b_berat = $_POST['bobot_berat'];

            // Panggil Model untuk hitung SAW
            $laptops = $this->model->getRecommendation($b_harga/100, $b_ram/100, $b_berat/100);
        }

        // Load View
        require 'views/user/recommendation.php'; 
    }

    // Menangani Hapus Laptop (Pindahan dari hapus_laptop.php)
    public function delete($id) {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }

        if ($this->model->deleteLaptop($id)) {
            header("Location: index.php?controller=admin&action=dashboard");
        } else {
            echo "Gagal menghapus data.";
        }
    }
}