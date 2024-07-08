<?php

class OrderController {
    private $orderModel;

    public function __construct() {
        $this->orderModel = new OrderModel();
    }

    public function list() {
        $orders = $this->orderModel->getAllOrders();
        include 'views/orders/list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'user_id' => $_POST['user_id'],
                'product' => $_POST['product'],
                'quantity' => $_POST['quantity'],
            ];
            $this->orderModel->createOrder($data);
            header('Location: /orders/list');
        }
        include 'views/orders/create.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'user_id' => $_POST['user_id'],
                'product' => $_POST['product'],
                'quantity' => $_POST['quantity'],
            ];
            $this->orderModel->updateOrder($id, $data);
            header('Location: /orders/list');
        }
        $order = $this->orderModel->getOrder($id);
        include 'views/orders/update.php';
    }

    public function delete($id) {
        $this->orderModel->deleteOrder($id);
        header('Location: /orders/list');
    }

    public function userOrders($userId) {
        $orders = array_filter($this->orderModel->getAllOrders(), function($order) use ($userId) {
            return $order['user_id'] == $userId;
        });
        include 'views/orders/user_orders.php';
    }
}
