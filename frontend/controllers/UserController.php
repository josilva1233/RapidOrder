<?php

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
                'last_name' => $_POST['last_name'],
                'fist_name' => $_POST['fist_name'],
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
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
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
