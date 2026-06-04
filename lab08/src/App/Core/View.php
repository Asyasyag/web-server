<?php
namespace App\Core;

class View
{
    public function render(string $template, array $data = []): void
    {
        extract($data, EXTR_SKIP);
        require __DIR__ . '/../../../templates/' . $template . '.php';
    }
}
