<?php

namespace src\Controllers;

use src\Config\Database;
use src\Config\Login;
use src\Models\User;

class AuthController
{
    private $conn;
    

    public function __construct()
    {
        $this->conn = new \mysqli(
            Database::$host,
            Database::$username,
            Database::$password,
            Database::$database
        );

        if ($this->conn->connect_error) {
            die('Connection failed: ' . $this->conn->connect_error);
        }

        $this->createTables();
    }

    private function createTables()
    {
        $createUsersTableQuery = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL
        )";
        $this->conn->query($createUsersTableQuery);

        $createTokensTableQuery = "CREATE TABLE IF NOT EXISTS tokens (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            token VARCHAR(255) NOT NULL,
            expiration INT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        )";
        $this->conn->query($createTokensTableQuery);

        $createAttributesTableQuery = "CREATE TABLE IF NOT EXISTS user_attributes (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            attribute_key VARCHAR(255) NOT NULL,
            attribute_value VARCHAR(255) NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        )";
        $this->conn->query($createAttributesTableQuery);
    }

    public function register($username, $password, $email)
    {
        $user = new User($username, $password, $email);

        $stmt = $this->conn->prepare('INSERT INTO users (username, password, email) VALUES (?, ?, ?)');
        $stmt->bind_param('sss', $user->getUsername(), $user->getPassword(), $user->getEmail());
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Handle success
        } else {
            // Handle failure
        }

        $stmt->close();
    }

    public function login($username, $password)
    {
        $stmt = $this->conn->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                // Handle success
                $token = $this->generateToken($user['id']);
                setcookie('token', $token, time() + Login::$TokenandCookieExpiration, '/', '', false, true); // Set the token as an HTTP-only cookie for 1 hour
                return $user;
            } else {
                // Handle incorrect password
            }
        } else {
            // Handle user not found
        }

        $stmt->close();
        return null;
    }
    
    public function logout()
    {
        /** usage:
         * $authController = new AuthController();
         * $authController->logout();
         */
        // Retrieve the user ID based on the token in the cookie
        $token = $_COOKIE['token'];
        // Delete token from the database
        $this->deleteToken($token);
         // Destroy the token cookie by setting an expired timestamp
        setcookie('token', '', time() - Login::$TokenandCookieExpiration, '/', '', false, true);

        // Redirect the user to the index page
        //header('Location: index.php');
        header('Location: '.Login::$LandingPageAfterLogout);
        exit();
    }

    public function generateToken($userId)
    {
        $token = bin2hex(random_bytes(32)); // Generate a random token
        $expiration = time() + 3600; // Set token expiration time to 1 hour from now

        // Delete existing tokens for the user
        $deleteStmt = $this->conn->prepare('DELETE FROM tokens WHERE user_id = ?');
        $deleteStmt->bind_param('i', $userId);
        $deleteStmt->execute();
        $deleteStmt->close();

        // Insert the new token
        $stmt = $this->conn->prepare('INSERT INTO tokens (user_id, token, expiration) VALUES (?, ?, ?)');
        $stmt->bind_param('isi', $userId, $token, $expiration);
        $stmt->execute();

        $stmt->close();
        return $token;
    }

    public function validateToken($token)
    {
        $stmt = $this->conn->prepare('SELECT user_id FROM tokens WHERE token = ? AND expiration > ?');
        $time = time();
        $stmt->bind_param('si', $token, $time);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $this->getUserById($result->fetch_assoc()['user_id']);
            // Handle successful token validation
            return $user;
        } else {
            // Handle token validation failure
        }

        $stmt->close();
        return null;
    }

    private function getUserIdFromToken($token)
    {
        $stmt = $this->conn->prepare('SELECT user_id FROM tokens WHERE token = ?');
        $stmt->bind_param('s', $token);
        $stmt->execute();
        $stmt->bind_result($userId);
        $stmt->fetch();
        $stmt->close();

        return $userId;
    }

    public function deleteToken($token)
    {
        $stmt = $this->conn->prepare('DELETE FROM tokens WHERE token = ?');
        $stmt->bind_param('s', $token);
        $stmt->execute();

        $stmt->close();
    }

    
    private function isUserAttributeExists($userId, $key)
    {
        $stmt = $this->conn->prepare('SELECT user_id FROM user_attributes WHERE user_id = ? AND attribute_key = ? LIMIT 1');
        $stmt->bind_param('is', $userId, $key);
        $stmt->execute();
        $stmt->store_result();
        $exists = $stmt->num_rows > 0;
        $stmt->close();
        return $exists;
    }

    public function deleteUserAttributes($userId)
    {
        $stmt = $this->conn->prepare('DELETE FROM user_attributes WHERE user_id = ?');
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $stmt->close();
    }

    private function saveUserAttribute($userId, $key, $value)
    {
        $stmt = $this->conn->prepare('INSERT INTO user_attributes (user_id, attribute_key, attribute_value) VALUES (?, ?, ?)');
        $stmt->bind_param('iss', $userId, $key, $value);
        $stmt->execute();
        $stmt->close();
    }

    private function updateUserAttribute($userId, $key, $value)
    {
        $stmt = $this->conn->prepare('UPDATE user_attributes SET attribute_value = ? WHERE user_id = ? AND attribute_key = ?');
        $stmt->bind_param('sis', $value, $userId, $key);
        $stmt->execute();
        $stmt->close();
    }

    public function getUserAttributes($userId)
    {
        $stmt = $this->conn->prepare('SELECT attribute_key, attribute_value FROM user_attributes WHERE user_id = ?');
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $attributes = [];

        while ($row = $result->fetch_assoc()) {
            $attributes[$row['attribute_key']] = $row['attribute_value'];
        }

        $stmt->close();
        return $attributes;
    }

    public function getUserById($userId)
    {
        $stmt = $this->conn->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            return new User($user['username'], $user['password'], $user['email']);
        }

        $stmt->close();
        return null;
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}

