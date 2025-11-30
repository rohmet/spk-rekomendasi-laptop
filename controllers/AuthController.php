<?php
// file: controllers/AuthController.php
require_once 'models/User.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
        if (isset($_SESSION['user_id'])) {
            header("Location: index.php");
            exit;
        }

        $error_message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->login($username, $password);

            if ($user) {
                // Set Session
                $_SESSION['user_id'] = $user['id_user'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Redirect sesuai Role
                if ($user['role'] == 'admin') {
                    header("Location: index.php?controller=admin&action=dashboard");
                } else {
                    header("Location: index.php");
                }
                exit;
            } else {
                $error_message = "Username atau Password salah!";
            }
        }

        require 'views/auth/login.php'; 
    }

    public function register() {
        if (isset($_SESSION['user_id'])) {
            header("Location: index.php");
            exit;
        }

        $error_message = '';
        $success_message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            if (empty($username) || empty($password)) {
                $error_message = "Semua kolom harus diisi!";
            } else {
                $result = $this->userModel->register($username, $password);

                if ($result === true) {
                    $success_message = "Registrasi berhasil! Silakan login.";
                } else {
                    $error_message = $result;
                }
            }
        }

        require 'views/auth/register.php';
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?controller=auth&action=login");
        exit;
    }
}