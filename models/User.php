<?php
require_once __DIR__ . '/../config/database.php';

class User {
    private $conn;
    private $table_name = "users";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function login($username, $password) {
        // 1. Cari user berdasarkan username
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // 2. Jika user ditemukan
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            // 3. Cek password cocok dengan hash
            if (password_verify($password, $user['password'])) {
                unset($user['password']);
                return $user;
            }
        }
        
        return false;
    }

    // FUNGSI: Registrasi User
    public function register($username, $password) {
        $checkQuery = "SELECT id_user FROM " . $this->table_name . " WHERE username = ?";
        $stmtCheck = $this->conn->prepare($checkQuery);
        $stmtCheck->bind_param("s", $username);
        $stmtCheck->execute();
        
        if ($stmtCheck->get_result()->num_rows > 0) {
            return "Username sudah terpakai, silakan pilih yang lain.";
        }

        // Enkripsi Password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $role = 'user';

        // Masukkan ke Database
        $query = "INSERT INTO " . $this->table_name . " (username, password, role) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $username, $hashed_password, $role);

        if ($stmt->execute()) {
            return true;
        } else {
            return "Gagal mendaftar: " . $this->conn->error;
        }
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_user = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>