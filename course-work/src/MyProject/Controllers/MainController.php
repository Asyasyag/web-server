<?php
namespace MyProject\Controllers;

use MyProject\Models\Recipes\Recipe;
use MyProject\View\View;

class MainController
{
    private View $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function home(): void
    {
        $this->view->renderHtml('main/home.php', [
            'recipes' => Recipe::findAll(),
            'title' => 'Кулинарная книга — курсовая работа',
        ]);
    }
}
