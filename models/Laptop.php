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
}

?>