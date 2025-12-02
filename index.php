<?php
session_start();
require_once 'config/database.php';

require_once 'controllers/AuthController.php';

$authController = new AuthController();
$authController->checkAutoLogin();

// Routing logic
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
       
        if ($action == 'login') {
            $authController->login();
        } elseif ($action == 'register') {
            $authController->register();
        } elseif ($action == 'logout') {
            $authController->logout();
        }
        break;

    case 'admin':
        require_once 'controllers/AdminController.php';
        $controller = new AdminController();

        if ($action == 'index' || $action == 'dashboard') {
            $controller->index();
        } elseif ($action == 'create') {
            $controller->create();
        } elseif ($action == 'store') {
            $controller->store();
        } elseif ($action == 'edit') {
            $controller->edit($id);
        } elseif ($action == 'update') {
            $controller->update($id);
        }
        break;
    
    default:
        echo "Halaman tidak ditemukan!";
        break;
}