<?php
spl_autoload_register(function (string $class): void {
    $prefix = 'MyProject\\';
    $baseDir = __DIR__ . '/MyProject/';
    if (str_starts_with($class, $prefix)) {
        $relative = substr($class, strlen($prefix));
        $file = $baseDir . str_replace('\\', '/', $relative) . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
});
