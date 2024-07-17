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
$uriSegments = explode('/', $uri);

$requestUri = $_SERVER['REQUEST_URI'];
$parsedUrl = parse_url($requestUri);
$queryString = $parsedUrl['query'] ?? '';
parse_str($queryString, $queryParams);
$id = $queryParams['id'] ?? null;

$controller = match ($uriSegments[3] ?? null) {
    'users' => new UserController(),
    'orders' => new OrderController(),
    'auth' => new AuthController(),
    default => null
};

$action = $uriSegments[4] ?? null;

if ($controller && $action) {
    match ([$uriSegments[3], $action]) {
        ['users', 'list'] => $controller->list(),
        ['users', 'create'] => $controller->create(),
        ['users', 'update'] => $controller->update($id),
        ['users', 'delete'] => $controller->delete($id),
        ['orders', 'list'] => $controller->list(),
        ['orders', 'create'] => $controller->create(),
        ['orders', 'update'] => $controller->update($id),
        ['orders', 'delete'] => $controller->delete($id),
        ['orders', 'user_orders'] => $controller->userOrders($id),
        ['auth', 'login'] => $controller->login(),
        ['auth', 'register'] => $controller->register(),
        default => null,
    };

} elseif ($uriSegments[2] === 'frontend') {
    echo (new AuthController())->login();
} else {
    echo '404 Not Found';
}

