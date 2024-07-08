<?php

require 'models/UserModel.php';
require 'models/OrderModel.php';
require 'controllers/AuthController.php';
require 'controllers/UserController.php';
require 'controllers/OrderController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

if ($uri[1] === 'users') {
    $controller = new UserController();
    if (isset($uri[2])) {
        if ($uri[2] === 'list') {
            $controller->list();
        } elseif ($uri[2] === 'create') {
            $controller->create();
        } elseif ($uri[2] === 'update' && isset($uri[3])) {
            $controller->update($uri[3]);
        } elseif ($uri[2] === 'delete' && isset($uri[3])) {
            $controller->delete($uri[3]);
        }
    }
} elseif ($uri[1] === 'orders') {
    $controller = new OrderController();
    if (isset($uri[2])) {
        if ($uri[2] === 'list') {
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
} elseif ($uri[1] === 'auth') {
    $controller = new AuthController();
    if (isset($uri[2])) {
        if ($uri[2] === 'login') {
            $controller->login();
        } elseif ($uri[2] === 'register') {
            $controller->register();
        }
    }
} else {
    echo '404 Not Found';
}
?>
