<?php
/**
 * Summary of namespace App\Controllers
*/
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
                'description' => $_POST['description'],
                'quantity' => $_POST['quantity'],
                'price' => $_POST['price'],
            ];
            $this->orderModel->createOrder($data);
            header('Location: /rapidorder/frontend/orders/create');
        }
        include 'views/orders/create.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'user_id' => $_POST['user_id'],
                'description' => $_POST['description'],
                'quantity' => $_POST['quantity'],
                'price' => $_POST['price'],
            ];
            $this->orderModel->updateOrder($id, $data);
            header("Location: /rapidorder/frontend/orders/list");
            var_dump($id);
        }
        $order = $this->orderModel->getOrder($id);
        include 'views/orders/update.php';
    }

    public function delete($id) {
        $this->orderModel->deleteOrder($id);
        header('Location: /rapidorder/frontend/orders/list');
    }

    public function userOrders($userId) {
        $orders = array_filter($this->orderModel->getAllOrders(), function($order) use ($userId) {
            return $order['user_id'] == $userId;
        });
        include 'views/orders/user_orders.php';
    }
}
