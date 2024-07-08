<?php
// /controllers/UserController.php
namespace App\Controllers;

use App\Models\User;
use PDO;

class UserController {
    private $userModel;

    public function __construct(PDO $db) {
        $this->userModel = new User($db);
    }

    public function index() {
        $users = $this->userModel->findAll();
        echo json_encode($users);
    }

    public function show($id) {
        $user = $this->userModel->findById($id);
        echo json_encode($user);
    }

    public function create() {
        $data = json_decode(file_get_contents("php://input"), true);
        $this->userModel->create($data);
        echo json_encode(['status' => 'success']);
    }

    public function update($id) {
        $data = json_decode(file_get_contents("php://input"), true);
        $this->userModel->update($id, $data);
        echo json_encode(['status' => 'success']);
    }

    public function delete($id) {
        $this->userModel->delete($id);
        echo json_encode(['status' => 'success']);
    }
}

