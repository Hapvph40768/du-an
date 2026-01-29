<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', function(){
    return "trang chủ";
});


$router->get('login', [App\Controllers\AuthController::class, 'showLogin']);
$router->post('login', [App\Controllers\AuthController::class, 'login']);

$router->get('register', [App\Controllers\AuthController::class, 'showRegister']);
$router->post('register', [App\Controllers\AuthController::class, 'register']);

$router->get('logout', [App\Controllers\AuthController::class, 'logout']);

?>