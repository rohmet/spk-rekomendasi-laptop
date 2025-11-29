<?php
session_start();
require_once 'models/Bookmark.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id_bookmark = $_GET['id'];
    $bookmarkModel = new Bookmark();
    $bookmarkModel->removeBookmark($id_bookmark);
    
    header("Location: favorit.php");
}
?>