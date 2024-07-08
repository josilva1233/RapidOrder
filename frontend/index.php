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
        } elseif ($uri[2] === 'create') {
            $controller->create();
        } elseif ($uri[2] === 'update' && isset($uri[3])) {
            $controller->update($uri[3]);
        } elseif ($uri[2] === 'delete' && isset($uri[3])) {
            $controller->delete($uri[3]);
        }
    }
} elseif ($uri[3] === 'orders') {
    $controller = new OrderController();
    if (isset($uri[3])) {
        if ($uri[4] === 'list') {
            $controller->list();
        } elseif ($uri[2] === 'create') {
            $controller->create();
        } elseif ($uri[2] === 'update' && isset($uri[3])) {
            $controller->update($uri[3]);
        } elseif ($uri[2] === 'delete' && isset($uri[3])) {
            $controller->delete($uri[3]);
        } elseif ($uri[2] === 'user' && isset($uri[3])) {
            $controller->userOrders($uri[3]);
        }
    }
} elseif ($uri[3] === 'auth') {
    $controller = new AuthController();
    if (isset($uri[5])) {
        if ($uri[5] === 'login') {
            $controller->login();
        } elseif ($uri[2] === 'register') {
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

