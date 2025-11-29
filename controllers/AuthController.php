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

    // FUNGSI: Logic Register
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if (empty($username) || empty($password)) {
                return "Semua kolom wajib diisi!";
            }

            if ($password !== $confirm_password) {
                return "Konfirmasi password tidak cocok!";
            }

            $userModel = new User();
            $result = $userModel->register($username, $password);

            if ($result === true) {
                echo "<script>
                        alert('Pendaftaran Berhasil! Silakan Login.');
                        window.location.href='login.php';
                      </script>";
                exit;
            } else {
                return $result;
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