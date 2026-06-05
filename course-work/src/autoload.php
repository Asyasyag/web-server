<?php
spl_autoload_register(function (string $className): void {
    $filePath = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
    if (is_file($filePath)) {
        require_once $filePath;
    }
});
