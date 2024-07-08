<?php
// Class Ordercontroller
namespace App\Controllers;

use App\Models\Order;
use PDO;

class OrderController {
    private $OrderModel;

    public function __construct(PDO $db) {
        $this->OrderModel = new Order($db);
    }

    public function index() {
        $Orders = $this->OrderModel->findAll();
        echo json_encode($Orders);
    }

    public function show($id) {
        $Order = $this->OrderModel->findById($id);
        echo json_encode($Order);
    }

    public function create() {
        $data = json_decode(file_get_contents("php://input"), true);
        $this->OrderModel->create($data);
        echo json_encode(['status' => 'success']);
    }

    public function update($id) {
        $data = json_decode(file_get_contents("php://input"), true);
        $this->OrderModel->update($id, $data);
        echo json_encode(['status' => 'success']);
    }

    public function delete($id) {
        $this->OrderModel->delete($id);
        echo json_encode(['status' => 'success']);
    }
}

