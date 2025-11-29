<?php
require_once __DIR__ . '/../config/database.php';

class Bookmark {
    private $conn;
    private $table = "bookmarks";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // CREATE: Simpan ke favorit
    public function addBookmark($id_user, $id_laptop) {
        $check = "SELECT * FROM " . $this->table . " WHERE id_user = ? AND id_laptop = ?";
        $stmt_check = $this->conn->prepare($check);
        $stmt_check->bind_param("ii", $id_user, $id_laptop);
        $stmt_check->execute();
        
        if ($stmt_check->get_result()->num_rows > 0) {
            return false;
        }

        $query = "INSERT INTO " . $this->table . " (id_user, id_laptop) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $id_user, $id_laptop);
        return $stmt->execute();
    }

    // READ: Ambil daftar favorit user tertentu (JOIN dengan tabel laptops)
    public function getMyBookmarks($id_user) {
        $query = "SELECT b.id_bookmark, l.* FROM " . $this->table . " b
                  JOIN laptops l ON b.id_laptop = l.id_laptop
                  WHERE b.id_user = ?
                  ORDER BY b.saved_at DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id_user);
        $stmt->execute();
        return $stmt->get_result();
    }

    // DELETE: Hapus dari favorit
    public function removeBookmark($id_bookmark) {
        $query = "DELETE FROM " . $this->table . " WHERE id_bookmark = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id_bookmark);
        return $stmt->execute();
    }
}
?>