<?php
session_start();

require_once 'commons/config.php';
require_once 'vendor/autoload.php';
require_once 'commons/route.php';
// require_once 'app/controllers/CourseController.php';
// echo getCourse();
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$basePath = trim(parse_url(BASE_URL, PHP_URL_PATH), '/');

$uri = trim(str_replace($basePath, '', $uri), '/');

// DISPATCH
$response = $dispatcher->dispatch(
    $_SERVER['REQUEST_METHOD'],
    $uri
);

echo $response;

?>