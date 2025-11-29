<?php
require_once __DIR__ . '/../config/database.php';

class Laptop {
    private $conn;
    private $table_name = "laptops";

    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // FUNGSI: HITUNG TOTAL DATA (Untuk Pagination)
    public function getTotalCount() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table_name;
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    // FUNGSI: AMBIL DATA DENGAN LIMIT (Pengganti getAll yang lama)
    public function getLaptopsPaginated($start_from, $limit) {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id_laptop DESC LIMIT ?, ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $start_from, $limit); // ii artinya dua integer
        $stmt->execute();
        return $stmt->get_result();
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

    // FUNGSI: Ambil Data Berdasarkan ID (Read)
    public function getLaptopById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_laptop = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // FUNGSI: Update Data (Update)
    public function updateLaptop($id, $data) {
        $query = "UPDATE " . $this->table_name . " SET 
                  brand=?, model_name=?, price=?, ram_gb=?, weight_kg=?, 
                  processor=?, gpu=?, screen_resolution=?, memory_type=?, os=?
                  WHERE id_laptop=?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssdidsssssi", 
            $data['brand'], 
            $data['model_name'], 
            $data['price'], 
            $data['ram_gb'], 
            $data['weight_kg'], 
            $data['processor'], 
            $data['gpu'], 
            $data['screen_resolution'], 
            $data['memory_type'], 
            $data['os'],
            $id
        );
        
        return $stmt->execute();
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

    // FUNGSI SPK: Hitung SAW
    public function getRecommendation($bobot_harga, $bobot_ram, $bobot_berat) {
        // 1. Ambil Nilai MIN/MAX untuk Normalisasi (Cari nilai ekstrim di dataset)
        // Kita butuh: Harga Termurah, Berat Teringan, dan RAM Terbesar
        $q_minmax = "SELECT MIN(price) as min_price, 
                             MIN(weight_kg) as min_weight, 
                             MAX(ram_gb) as max_ram 
                      FROM " . $this->table_name;
        $res_minmax = $this->conn->query($q_minmax)->fetch_assoc();
        
        $min_price = $res_minmax['min_price'];
        $min_weight = $res_minmax['min_weight'];
        $max_ram = $res_minmax['max_ram'];

        // 2. Ambil Semua Data Laptop
        $query = "SELECT * FROM " . $this->table_name;
        $result = $this->conn->query($query);
        
        $hasil_rekomendasi = [];

        // 3. Looping Normalisasi & Hitung Skor
        while($row = $result->fetch_assoc()) {
            // Harga (Cost): Min / Nilai
            $norm_harga = $min_price / $row['price'];
            
            // Berat (Cost): Min / Nilai
            $norm_berat = $min_weight / $row['weight_kg'];
            
            // RAM (Benefit): Nilai / Max
            $norm_ram = $row['ram_gb'] / $max_ram;

            // Hitung Skor Akhir (Preferensi)
            // Rumus: (Norm x Bobot) + (Norm x Bobot) ...
            $skor_akhir = ($norm_harga * $bobot_harga) + 
                          ($norm_ram * $bobot_ram) + 
                          ($norm_berat * $bobot_berat);

            // Masukkan skor ke array data
            $row['skor_saw'] = $skor_akhir;
            $hasil_rekomendasi[] = $row;
        }

        usort($hasil_rekomendasi, function($a, $b) {
            return $b['skor_saw'] <=> $a['skor_saw'];
        });

        return array_slice($hasil_rekomendasi, 0, 15);
    }
}

?>