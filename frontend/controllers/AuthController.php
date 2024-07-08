<?php

class AuthController {
    public function login() {
        include 'views/auth/login.php';
    }

    public function register() {
        include 'views/auth/register.php';
    }
}
