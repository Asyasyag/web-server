<?php
if (PHP_SAPI === 'cli-server') {
    $file = __DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if (is_file($file)) {
        return false;
    }
}

require_once __DIR__ . '/../src/autoload.php';

use MyProject\Controllers\MainController;
use MyProject\Controllers\SavingsController;

$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$basePath = rtrim($scriptDir, '/');
if ($basePath === '/' || $basePath === '.') {
    $basePath = '';
}
define('BASE_PATH', $basePath);

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';
if ($basePath !== '' && strpos($url, $basePath) === 0) {
    $url = substr($url, strlen($basePath));
}
$url = trim($url, '/');

$routes = [
    '~^$~' => [MainController::class, 'home'],
    '~^months$~' => [SavingsController::class, 'index'],
    '~^months/(\d+)$~' => [SavingsController::class, 'show'],
    '~^admin$~' => [SavingsController::class, 'admin'],
    '~^admin/add$~' => [SavingsController::class, 'add'],
    '~^admin/(\d+)/edit$~' => [SavingsController::class, 'edit'],
    '~^admin/(\d+)/delete$~' => [SavingsController::class, 'delete'],
];

foreach ($routes as $pattern => [$controllerClass, $action]) {
    if (preg_match($pattern, $url, $matches)) {
        $controller = new $controllerClass();
        isset($matches[1]) ? $controller->$action((int)$matches[1]) : $controller->$action();
        exit;
    }
}

http_response_code(404);
require_once __DIR__ . '/../templates/errors/404.php';
