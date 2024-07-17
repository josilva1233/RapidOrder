<?php
class AuthController {
    public function login() {

            include 'src/views/auth/login.php';

    }

    public function register() {
        session_start(); // Iniciar a sessão

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verificar se o campo de email está preenchido
            if (!empty($_POST['email'])) {
                $first_name = $_POST['first_name'];
                $email = base64_encode($_POST['email']);
                $password = $_POST['password'];
                            // Criptografar a senha
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $userModel = new UserModel();
                $response = $userModel->login($email, $first_name, $hashed_password);

                if (isset($response['success']) && $response['success']) {
                    // Sucesso no login
                    $_SESSION['user'] = $response['data'];
                    header('Location: /dashboard');
                    exit;
                } else {
                    // Falha no login
                    $error = isset($response['message']) ? $response['message'] : 'Login failed. Please try again.';
                    include 'src/views/auth/register.php';
                }
            } else {
                // Campo de email vazio
                $error = 'Please enter your email.';
                include 'src/views/auth/register.php';
            }
        } else {
            include 'src/views/auth/register.php';
        }
    }
}

