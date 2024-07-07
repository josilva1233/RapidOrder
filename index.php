<?php

include 'includes/includes.php';

use App\Controllers\UserController;
use App\Config\Database;

$db = Database::connect();
$userController = new UserController($db);

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];


if (preg_match('/\/api\/users\/(\d+)/', $requestUri, $matches)) {
    $id = $matches[1];
    if ($requestMethod === 'GET') {
        $userController->show($id);
    } elseif ($requestMethod === 'PUT') {
        $userController->update($id);
    } elseif ($requestMethod === 'DELETE') {
        $userController->delete($id);
    }
} elseif ($requestUri === '/rapidorder/api/users' && $requestMethod === 'GET') {
    $userController->index();
} elseif ($requestUri === '/rapidorder/api/users' && $requestMethod === 'POST') {
    $userController->create();
} else {
    header("HTTP/1.0 404 Not Found");
    echo json_encode(['status' => 'URL incorreta', 'message' => 'Not Found']);
}
