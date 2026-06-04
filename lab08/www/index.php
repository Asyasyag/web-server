<?php
require_once __DIR__ . '/../src/autoload.php';

use App\Controllers\PageController;
use App\Core\Router;

$controller = new PageController();
$router = new Router();
$router->get('/', fn() => $controller->home());
$router->get('/about', fn() => $controller->about());
$router->get('/404', fn() => $controller->notFound());
$router->dispatch($_GET['path'] ?? '/');
