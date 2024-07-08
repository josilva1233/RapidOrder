<?php

require 'models/UserModel.php';
require 'models/OrderModel.php';
require 'controllers/AuthController.php';
require 'controllers/UserController.php';
require 'controllers/OrderController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

if ($uri[3] === 'users') {
    $controller = new UserController();
    if (isset($uri[3])) {
        if ($uri[4] === 'list') {
            $controller->list();
        } elseif ($uri[4] === 'create') {
            $controller->create();
        } elseif ($uri[4] === 'update' && isset($uri[4])) {
            $controller->update($uri[5]);
        } elseif ($uri[4] === 'delete' && isset($uri[4])) {
            $controller->delete($uri[5]);
        }
    }
} elseif ($uri[3] === 'orders') {
    $controller = new OrderController();
    if (isset($uri[3])) {
        if ($uri[4] === 'list') {
            $controller->list();
        } elseif ($uri[4] === 'create') {
            $controller->create();
        } elseif ($uri[4] === 'update' && isset($uri[4])) {
            $controller->update($uri[5]);
        } elseif ($uri[4] === 'delete' && isset($uri[4])) {
            $controller->delete($uri[5]);
        } elseif ($uri[4] === 'user' && isset($uri[4])) {
            $controller->userOrders($uri[5]);
        }
    }
} elseif ($uri[3] === 'auth') {
    $controller = new AuthController();
    if (isset($uri[4])) {
        if ($uri[5] === 'login') {
            $controller->login();
        } elseif ($uri[4] === 'register') {
            $controller->register();
        }
    }
}elseif ($uri[2] === 'frontend') {
    $controller = new AuthController();
    $controller->login();
}
else {
    echo '404 Not Found';
}

