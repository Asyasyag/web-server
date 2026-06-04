<?php
namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\View\View;

class ArticleController
{
    private View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function list(): void
    {
        $this->view->render('articles/list', ['title' => 'Статьи', 'articles' => Article::findAll()]);
    }

    public function view(int $id): void
    {
        $article = Article::findOneById($id);
        if ($article === null) {
            http_response_code(404);
            $this->view->render('errors/404', ['title' => 'Ошибка']);
            return;
        }
        $this->view->render('articles/view', ['title' => $article->getName(), 'article' => $article]);
    }

    public function edit(?int $id = null): void
    {
        $article = $id ? Article::findOneById($id) : null;
        $this->view->render('articles/edit', ['title' => $id ? 'Редактирование' : 'Создание', 'article' => $article]);
    }

    public function save(?int $id = null): void
    {
        $savedId = Article::saveFromForm($_POST, $id);
        header('Location: index.php?action=view&id=' . $savedId);
        exit;
    }
}
