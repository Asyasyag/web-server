<?php
namespace MyProject\Controllers;

use MyProject\View\View;

class MainController
{
    private View $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function hello(): void
    {
        $this->view->render('hello', ['name' => 'Сиддикова А. М.', 'group' => '251-321']);
    }

    public function bye(): void
    {
        $this->view->render('bye', ['name' => 'Сиддикова А. М.']);
    }
}
