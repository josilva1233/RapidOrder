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
        include 'views/users/list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'document' => $_POST['document'],
                'email' => $_POST['email'],
                'phone_number' => $_POST['phone_number'],
                'birth_date' => $_POST['birth_date'],
            ];
            $this->userModel->createUser($data);
            header('Location: /rapidorder/frontend/users/list');
        }
        include 'views/users/create.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'document' => $_POST['document'],
                'email' => $_POST['email'],
                'phone_number' => $_POST['phone_number'],
                'birth_date' => $_POST['birth_date'],
            ];
            $this->userModel->updateUser($id, $data);
            header('Location: /rapidorder/frontend/users/list');
        }
        $user = $this->userModel->getUser($id);
        include 'views/users/update.php';
    }

    public function delete($id) {
        $this->userModel->deleteUser($id);
        header('Location: /rapidorder/frontend/users/list');
    }
}
