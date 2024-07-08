<?php

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function list() {
        $users = $this->userModel->getAllUsers();
        include '/views/users/list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
            ];
            $this->userModel->createUser($data);
            header('Location: /users/list');
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
            header('Location: /users/list');
        }
        $user = $this->userModel->getUser($id);
        include 'views/users/update.php';
    }

    public function delete($id) {
        $this->userModel->deleteUser($id);
        header('Location: /users/list');
    }
}
