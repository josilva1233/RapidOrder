<?php
class AuthController {
    public function login() {
        session_start(); // Iniciar a sessão

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verificar se o campo de email está preenchido
            if (!empty($_POST['email'])) {
                $email = $_POST['email'];

                $userModel = new UserModel();
                $response = $userModel->login($email);

                if (isset($response['success']) && $response['success']) {
                    // Sucesso no login
                    $_SESSION['user'] = $response['data'];
                    header('Location: /dashboard');
                    exit;
                } else {
                    // Falha no login
                    $error = isset($response['message']) ? $response['message'] : 'Login failed. Please try again.';
                    include 'src/views/auth/login.php';
                }
            } else {
                // Campo de email vazio
                $error = 'Please enter your email.';
                include 'src/views/auth/login.php';
            }
        } else {
            include 'src/views/auth/login.php';
        }
    }

    public function register() {
        include 'src/views/auth/register.php';
    }
}

