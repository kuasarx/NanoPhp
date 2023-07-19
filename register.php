<?php

require_once 'src/Config/Database.php';
require_once 'src/Controllers/AuthController.php';
require_once 'src/Models/User.php';

use src\Controllers\AuthController;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    $authController = new AuthController();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $authController->register($username, $password, $email);

    // Redirect to a success page or handle the result accordingly
    header('Location: protected_page.php');
    exit();
}

// Render the register view
include 'src/views/register.php';

?>
