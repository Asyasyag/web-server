<?php
namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\View\View;

class ArticlesController
{
    private View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function view(int $id): void
    {
        $article = Article::findOneById($id);
        if ($article === null) {
            http_response_code(404);
            $this->view->render('errors/404', ['title' => 'Статья не найдена']);
            return;
        }
        $this->view->render('articles/view', ['title' => $article->getName(), 'article' => $article]);
    }

    public function list(): void
    {
        $this->view->render('articles/list', ['title' => 'Список статей', 'articles' => Article::findAll()]);
    }
}
