<?php
session_start();
require_once 'config/database.php';

// Ambil parameter dari URL (Contoh: index.php?controller=laptop&action=delete&id=5)
$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'laptop';
$action         = isset($_GET['action']) ? $_GET['action'] : 'index';
$id             = isset($_GET['id']) ? $_GET['id'] : null;

switch ($controllerName) {
    
    case 'laptop':
        require_once 'controllers/LaptopController.php';
        $controller = new LaptopController();
        if ($action == 'index') {
            $controller->index();
        } elseif ($action == 'delete') {
            $controller->delete($id);
        }
        break;

    case 'bookmark':
        require_once 'controllers/BookmarkController.php';
        $controller = new BookmarkController();
        
        if ($action == 'index') {
            $controller->index();
        } elseif ($action == 'simpan') {
            $controller->store($id);
        } elseif ($action == 'delete') {
            $controller->delete($id);
        }
        break;
    
    case 'auth':
        require_once 'controllers/AuthController.php';
        $controller = new AuthController();
        
        if ($action == 'login') {
            $controller->login();
        } elseif ($action == 'register') {
            $controller->register();
        } elseif ($action == 'logout') {
            $controller->logout();
        }
        break;
    
    default:
        echo "Halaman tidak ditemukan!";
        break;
}