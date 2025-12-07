<?php
require_once 'models/Laptop.php';

class LaptopController {
    private $model;

    public function __construct() {
        $this->model = new Laptop();
    }

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

            $laptops = $this->model->getRecommendation($b_harga/100, $b_ram/100, $b_berat/100);
        }

        require 'views/user/recommendation.php'; 
    }
}