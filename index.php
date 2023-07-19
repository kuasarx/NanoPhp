<?php

require_once 'src/Config/Database.php';
require_once 'src/Controllers/AuthController.php';
require_once 'src/Models/User.php';

use src\Controllers\AuthController;

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
    $authController = new AuthController();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $authController->login($username, $password);

    if ($user) {
        print_r($user);
        // Successful login, token and cookie are generated.
        // Redirect to the protected page or handle the result accordingly
        header('Location: protected_page.php');
        exit();
    } else {
        // Handle login failure, show error message
        $errorMessage = 'Invalid username or password';
    }
}

// Render the login form
include 'src/views/login.php';

?>
