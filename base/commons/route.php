<?php

use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

/*
|--------------------------------------------------------------------------
| MIDDLEWARE (FILTER)
|--------------------------------------------------------------------------
*/

// Middleware: đã đăng nhập
$router->filter('auth', function () {
    if (!isset($_SESSION['auth'])) {
        header('Location: ' . BASE_URL . 'login');
        exit;
    }
});

// Middleware: chưa đăng nhập
$router->filter('guest', function () {
    if (isset($_SESSION['auth'])) {
        header('Location: ' . BASE_URL);
        exit;
    }
});

// Middleware: chỉ admin
$router->filter('admin', function () {
    if (!isset($_SESSION['auth']) || $_SESSION['auth']->role !== 'admin') {
        http_response_code(403);
        echo '403 - Bạn không có quyền truy cập';
        exit;
    }
});

/*
|--------------------------------------------------------------------------
| ROUTES
|--------------------------------------------------------------------------
*/

// Trang chủ
$router->get('/', function () {
    return 'Trang chủ';
});

// ===== AUTH =====

// Chỉ khách (chưa login)
$router->group(['before' => 'guest'], function ($router) {
    $router->get('login', [App\Controllers\AuthController::class, 'showLogin']);
    $router->post('login', [App\Controllers\AuthController::class, 'login']);

    $router->get('register', [App\Controllers\AuthController::class, 'showRegister']);
    $router->post('register', [App\Controllers\AuthController::class, 'register']);
});

// Chỉ user đã login
$router->group(['before' => 'auth'], function ($router) {
    $router->get('logout', [App\Controllers\AuthController::class, 'logout']);
});

// Ví dụ route admin (đồ án cộng điểm)
$router->group(['before' => ['auth', 'admin']], function ($router) {
    $router->get('admin', [App\Controllers\AdminController::class, 'dashboard']);
});
