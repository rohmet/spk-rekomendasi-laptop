<?php
require_once 'controllers/AuthController.php';

// 1. Inisialisasi Controller
$auth = new AuthController();

// 2. Jalankan logika login (Cek POST, Cek Password, dll)
// Jika gagal, dia akan mengembalikan pesan error string.
// Jika sukses, dia akan redirect (header location) di dalam fungsi login().
$error_message = $auth->login();

require 'views/login.php';
?>