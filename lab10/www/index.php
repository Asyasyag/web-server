<?php
require_once __DIR__ . '/../src/autoload.php';

use MyProject\Controllers\ArticleController;

$controller = new ArticleController();
$action = $_GET['action'] ?? 'list';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?: null;

match ($action) {
    'view' => $id ? $controller->view($id) : $controller->list(),
    'edit' => $controller->edit($id),
    'save' => $controller->save($id),
    default => $controller->list(),
};
