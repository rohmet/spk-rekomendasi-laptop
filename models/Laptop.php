<?php
require_once __DIR__ . '/../config/database.php';

class Laptop {
    private $conn;
    private $table_name = "laptops";

    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getRecent() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id_laptop DESC LIMIT 10";
        $result = $this->conn->query($query);
        return $result;
    }

    // FUNGSI: Ambil data
    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id_laptop DESC LIMIT 15";
        $result = $this->conn->query($query);
        return $result;
    }

    // FUNGSI: Tambah Data (Create)
    public function insertLaptop($data) {
        $query = "INSERT INTO " . $this->table_name . " 
                  (brand, model_name, price, ram_gb, weight_kg, processor, gpu, screen_resolution, memory_type, os)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        
        // Binding parameter (s = string, d = double/float, i = integer)
        $stmt->bind_param("ssdidsssss", 
            $data['brand'], 
            $data['model_name'], 
            $data['price'], 
            $data['ram_gb'], 
            $data['weight_kg'], 
            $data['processor'], 
            $data['gpu'], 
            $data['screen_resolution'], 
            $data['memory_type'], 
            $data['os']
        );
        
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // FUNGSI: Hapus Data (Delete)
    public function deleteLaptop($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_laptop = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
}

?>