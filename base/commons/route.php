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

$router->filter('guest', function () {
    if (isset($_SESSION['auth'])) {
        header('Location: ' . BASE_URL);
        exit;
    }
});

$router->filter('admin', function () {
    if ($_SESSION['auth']['role'] !== 'admin') {
        http_response_code(403);
        echo '403 - Chỉ admin mới được truy cập';
        exit;
    }
});

$router->filter('staff', function () {
    if (!in_array($_SESSION['auth']['role'], ['admin','staff'])) {
        http_response_code(403);
        echo '403 - Không có quyền';
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

// ========== AUTH ==========

// Khách chưa đăng nhập
$router->group(['before' => 'guest'], function ($router) {
    $router->get('login', [App\Controllers\AuthController::class, 'showLogin']);
    $router->post('login', [App\Controllers\AuthController::class, 'login']);

    $router->get('register', [App\Controllers\AuthController::class, 'showRegister']);
    $router->post('register', [App\Controllers\AuthController::class, 'register']);
});

// User đã đăng nhập
$router->group(['before' => 'auth'], function ($router) {
    $router->get('logout', [App\Controllers\AuthController::class, 'logout']);
});

// ========== ADMIN ==========
$router->group(['before' => ['auth','admin']], function ($router) {
    $router->get('admin/dashboard', [App\Controllers\AdminController::class, 'dashboard']);
});

// ========== STAFF ==========
