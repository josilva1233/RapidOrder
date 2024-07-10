<?php
/**
 * Summary of namespace App
 */
require 'src/models/UserModel.php';
require 'src/models/OrderModel.php';
require 'src/controllers/AuthController.php';
require 'src/controllers/UserController.php';
require 'src/controllers/OrderController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

$controller = match ($uri[3]) {
    'users' => new UserController(),
    'orders' => new OrderController(),
    'auth' => new AuthController(),
    default => null
};

if ($controller) {
    match ($uri[3]) {
        'users' => isset($uri[4]) ? match ($uri[4]) {
            'list' => $controller->list(),
            'create' => $controller->create(),
            'update' => $controller->update($uri[5]),
            'delete' => $controller->delete($uri[5]),
            default => null
        } : null,
        'orders' => isset($uri[4]) ? match ($uri[4]) {
            'list' => $controller->list(),
            'create' => $controller->create(),
            'update' => $controller->update($uri[5]),
            'delete' => $controller->delete($uri[5]),
            'user_orders' => $controller->userOrders($uri[4]),
            default => null
        } : null,
        'auth' => isset($uri[4]) ? match ($uri[4]) {
            'login' => $controller->login(),
            'register' => $controller->register(),
            default => null
        } : null,
        default => null
    };
} elseif ($uri[2] === 'frontend') {
    (new AuthController())->login();
} else {
    echo '404 Not Found';
}

