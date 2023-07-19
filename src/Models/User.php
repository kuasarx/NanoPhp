<?php

namespace src\Models;

class User
{
    private $id;
    private $username;
    private $password;
    private $email;
    private $attributes = [];

    public function __construct($username, $password, $email) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    public function setAttribute($key, $value) {
        $this->attributes[$key] = $value;
    }

    public function getAttribute($key) {
        return $this->attributes[$key] ?? null;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function getPassword()
    {
        $this->setPassword($this->password);
        return $this->password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function verifyPassword($password)
    {
        return password_verify($password, $this->password);
    }

    public function updateAttributes($attributes = []) {
        $this->attributes = $attributes;
    }
}