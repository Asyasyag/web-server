<?php
namespace App\Controllers;

use App\Core\View;

class PageController
{
    private View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function home(): void
    {
        $this->view->render('page', ['title' => 'Главная', 'text' => 'Маршрут / обработан контроллером.']);
    }

    public function about(): void
    {
        $this->view->render('page', ['title' => 'О работе', 'text' => 'Сиддикова А. М., группа 251-321. Демонстрация простого роутера.']);
    }

    public function notFound(): void
    {
        http_response_code(404);
        $this->view->render('page', ['title' => '404', 'text' => 'Такой страницы в мини-приложении нет.']);
    }
}
