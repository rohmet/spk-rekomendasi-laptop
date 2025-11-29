<?php
session_start();
require_once 'models/Bookmark.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id_laptop = $_GET['id'];
    $id_user = $_SESSION['user_id'];

    $bookmarkModel = new Bookmark();
    if ($bookmarkModel->addBookmark($id_user, $id_laptop)) {
        header("Location: favorit.php");
    } else {
        echo "<script>alert('Laptop ini sudah ada di favoritmu!'); window.history.back();</script>";
    }
}
?>