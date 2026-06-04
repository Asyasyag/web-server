<?php
namespace App\Core;

class Router
{
    private array $routes = [];

    public function get(string $path, callable $handler): void
    {
        $this->routes[$path] = $handler;
    }

    public function dispatch(string $path): void
    {
        $handler = $this->routes[$path] ?? $this->routes['/404'];
        $handler();
    }
}
