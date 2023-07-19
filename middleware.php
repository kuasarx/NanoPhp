<?php
require_once 'src/Config/Database.php';
require_once 'src/Controllers/AuthController.php';
require_once 'src/Models/User.php';

use src\Controllers\AuthController;
$AuthController = new AuthController();
// Check if the token cookie is present
if (!isset($_COOKIE['token'])) {
    header('HTTP/1.0 401 Unauthorized');
    exit();
}

// Retrieve the token from the cookie
$token = $_COOKIE['token'];

// Validate the token and retrieve the user
$user = $AuthController->validateToken($token);

if (!$user) {
    header('HTTP/1.0 401 Unauthorized');
    exit();
}

// The token is valid, continue with the protected page
// You can access the user information using the $user variable