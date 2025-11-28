<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    
    public function login() {
        // Mulai Session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Cek apakah form disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new User();
            $userData = $userModel->login($username, $password);

            if ($userData) {
                // Simpan data user ke Session 
                $_SESSION['user_id'] = $userData['id_user'];
                $_SESSION['username'] = $userData['username'];
                $_SESSION['role'] = $userData['role'];

                // Redirect sesuai Role
                if ($userData['role'] === 'admin') {
                    header("Location: dashboard.php");
                } else {
                    header("Location: index.php");
                }
                exit;
            } else {
                return "Username atau Password salah!";
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: login.php");
        exit;
    }
}
?>