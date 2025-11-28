<?php

class Database {
    private $host = "localhost";
    private $db_name = "db_laptop_spk";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        } catch(Exception $e) {
            echo "Koneksi Error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>