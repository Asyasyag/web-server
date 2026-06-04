<?php
namespace MyProject\View;

class View
{
    public function __construct(private string $templatePath) {}

    public function render(string $template, array $vars = []): void
    {
        extract($vars, EXTR_SKIP);
        require $this->templatePath . '/' . $template . '.php';
    }
}
