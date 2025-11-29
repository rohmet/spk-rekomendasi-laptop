<?php
// register.php
require_once 'controllers/AuthController.php';

$auth = new AuthController();
$error_message = $auth->register();

require 'views/register.php';
?>