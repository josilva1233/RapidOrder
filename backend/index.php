<?php

include 'includes/includes.php';

use App\Controllers\UserController;
use App\Controllers\OrderController;
use App\Config\Database;

$db = Database::connect();
$userController = new UserController($db);
$orderController = new OrderController($db);

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];
$routUsers = '/rapidorder/backend/api/users';
$routOrdes = '/rapidorder/backend/api/orders';

if (preg_match('/\/api\/users\/(\d+)/', $requestUri, $matches)) {
    $id = $matches[1];
    if ($requestMethod === 'GET') {
        $userController->show($id);
    } elseif ($requestMethod === 'PUT') {
        $userController->update($id);
    } elseif ($requestMethod === 'DELETE') {
        $userController->delete($id);
    }
} elseif ($requestUri === $routUsers && $requestMethod === 'GET') {
    $userController->index();
} elseif ($requestUri === $routUsers && $requestMethod === 'POST') {
    $userController->create();
} elseif (preg_match('/\/api\/orders\/(\d+)/', $requestUri, $matches)) {
    $id = $matches[1];
    if ($requestMethod === 'GET') {
        $orderController->show($id);
    } elseif ($requestMethod === 'PUT') {
        $orderController->update($id);
    } elseif ($requestMethod === 'DELETE') {
        $orderController->delete($id);
    }
} elseif ($requestUri === $routOrdes && $requestMethod === 'GET') {
    $orderController->index();
} elseif ($requestUri === $routOrdes && $requestMethod === 'POST') {
    $orderController->create();
}else {
    header("HTTP/1.0 404 Not Found");
    echo json_encode([
        'status' => 'error',
        'message' => 'URL incorreta',
        'available_uris' => [$routOrdes, $routUsers],
        'requested_method' => $_SERVER['REQUEST_METHOD']
    ]);
}

