<?php
/**
 * Summary of namespace App\Controllers
*/

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function list() {
        $users = $this->userModel->getAllUsers();
        include 'src/views/users/list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'document' => base64_encode($_POST['document']),
                'email' => base64_encode($_POST['email']),
                'phone_number' => base64_encode($_POST['phone_number']),
                'birth_date' => $_POST['birth_date'],
            ];
            $this->userModel->createUser($data);
            header('Location: /rapidorder/frontend/users/list');
        }
        include 'src/views/users/create.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'document' => base64_encode($_POST['document']),
                'email' => base64_encode($_POST['email']),
                'phone_number' => base64_encode($_POST['phone_number']),
                'birth_date' => $_POST['birth_date'],
            ];
            $this->userModel->updateUser($id, $data);
            header('Location: /rapidorder/frontend/users/list');
        }
        $user = $this->userModel->getUser($id);
        // Decodifica os dados recuperados do banco, se necessário
        $user['document'] = base64_decode($user['document']);
        $user['email'] = base64_decode($user['email']);
        $user['phone_number'] = base64_decode($user['phone_number']);
        include 'src/views/users/update.php';
    }

    public function delete($id) {
        $this->userModel->deleteUser($id);
        header('Location: /rapidorder/frontend/users/list');
    }
}

