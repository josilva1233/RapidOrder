<?php
/**
 * Summary of namespace App
 */
require 'models/UserModel.php';
require 'models/OrderModel.php';
require 'controllers/AuthController.php';
require 'controllers/UserController.php';
require 'controllers/OrderController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

/**
 * Summary of routes
 */
$controller = null;

$uri[3] === 'users' ? $controller = new UserController() :
    ($uri[3] === 'orders' ? $controller = new OrderController() :
    ($uri[3] === 'auth' ? $controller = new AuthController() : 
    ($uri[2] === 'frontend' ? $controller = new AuthController() : 
    null)));

if ($controller) {
    $uri[3] === 'users' ?
        (isset($uri[4]) ? 
            ($uri[4] === 'list' ? $controller->list() :
            ($uri[4] === 'create' ? $controller->create() :
            ($uri[4] === 'update' ? $controller->update($uri[5]) :
            ($uri[4] === 'delete' ? $controller->delete($uri[5]) : null)))) : null) :
    ($uri[3] === 'orders' ?
        (isset($uri[4]) ? 
            ($uri[4] === 'list' ? $controller->list() :
            ($uri[4] === 'create' ? $controller->create() :
            ($uri[4] === 'update' ? $controller->update($uri[5]) :
            ($uri[4] === 'delete' ? $controller->delete($uri[5]) :
            ($uri[4] === 'user_orders' ? $controller->userOrders($uri[4]) : null))))) : null) :
    ($uri[3] === 'auth' ?
        (isset($uri[4]) ? 
            ($uri[4] === 'login' ? $controller->login() :
            ($uri[4] === 'register' ? $controller->register() : null)) : null) :
    ($uri[2] === 'frontend' ? $controller->login() : null)));
} else {
    echo '404 Not Found';
}

