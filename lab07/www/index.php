<?php
require_once __DIR__ . '/../src/autoload.php';

use MyProject\Controllers\MainController;

$controller = new MainController();
$route = $_GET['route'] ?? 'hello';
if ($route === 'bye') {
    $controller->bye();
} else {
    $controller->hello();
}
