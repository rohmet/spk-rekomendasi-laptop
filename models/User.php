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
}
?>