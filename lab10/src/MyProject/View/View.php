<?php
namespace MyProject\View;

class View
{
    public function render(string $template, array $vars = []): void
    {
        extract($vars, EXTR_SKIP);
        require __DIR__ . '/../../../templates/header.php';
        require __DIR__ . '/../../../templates/' . $template . '.php';
        require __DIR__ . '/../../../templates/footer.php';
    }
}
