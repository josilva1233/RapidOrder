<?php
/**
 * Summary of namespace App\Controllers
*/

class AuthController {
    public function login() {
        include 'src/views/auth/login.php';
    }

    public function register() {
        include 'src/views/auth/register.php';
    }
}
