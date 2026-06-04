<?php
require_once __DIR__ . '/../src/autoload.php';

use MyProject\Controllers\ArticlesController;

$controller = new ArticlesController();
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id) {
    $controller->view($id);
} else {
    $controller->list();
}
