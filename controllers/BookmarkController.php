<?php
require_once 'models/Bookmark.php';

class BookmarkController {
    private $model;

    public function __construct() {
        $this->model = new Bookmark();
    }

    public function store($id_laptop) {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }

        $id_user = $_SESSION['user_id'];

        if ($this->model->addBookmark($id_user, $id_laptop)) {
            header("Location: index.php?controller=user&action=favorit");
        } else {
            echo "<script>alert('Laptop ini sudah ada di favoritmu!'); window.history.back();</script>";
        }
    }
    
}