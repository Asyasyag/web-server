<?php
namespace MyProject\Controllers;

use MyProject\Models\Recipes\Recipe;
use MyProject\Models\Users\User;
use MyProject\View\View;

class RecipeController
{
    private View $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function index(): void
    {
        $this->view->renderHtml('recipes/list.php', [
            'recipes' => Recipe::findAll(),
            'title' => 'Все рецепты',
        ]);
    }

    public function show(int $recipeId): void
    {
        $recipe = Recipe::getById($recipeId);
        if ($recipe === null) {
            http_response_code(404);
            $this->view->renderHtml('errors/404.php', ['title' => 'Рецепт не найден']);
            return;
        }

        $servings = isset($_GET['servings']) ? max(1, (int)$_GET['servings']) : $recipe->getServings();

        $this->view->renderHtml('recipes/view.php', [
            'recipe' => $recipe,
            'author' => User::getById($recipe->getAuthorId()),
            'servings' => $servings,
            'totalCalories' => $servings * $recipe->getCaloriesPerServing(),
            'title' => $recipe->getName(),
        ]);
    }

    public function admin(): void
    {
        $this->view->renderHtml('admin/index.php', [
            'recipes' => Recipe::findAll(),
            'title' => 'Администрирование рецептов',
        ]);
    }

    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $recipe = new Recipe();
            $this->fillFromPost($recipe);
            $recipe->setAuthorId(1);
            $recipe->save();
            header('Location: ' . BASE_PATH . '/admin');
            return;
        }

        $this->view->renderHtml('admin/add.php', ['title' => 'Новый рецепт']);
    }

    public function edit(int $recipeId): void
    {
        $recipe = Recipe::getById($recipeId);
        if ($recipe === null) {
            http_response_code(404);
            $this->view->renderHtml('errors/404.php', ['title' => 'Рецепт не найден']);
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->fillFromPost($recipe);
            $recipe->save();
            header('Location: ' . BASE_PATH . '/recipes/' . $recipe->getId());
            return;
        }

        $this->view->renderHtml('admin/edit.php', [
            'recipe' => $recipe,
            'title' => 'Редактирование рецепта',
        ]);
    }

    public function delete(int $recipeId): void
    {
        $recipe = Recipe::getById($recipeId);
        if ($recipe !== null) {
            $recipe->delete();
        }
        header('Location: ' . BASE_PATH . '/admin');
    }

    private function fillFromPost(Recipe $recipe): void
    {
        $recipe->setName($_POST['name'] ?? '');
        $recipe->setIngredients($_POST['ingredients'] ?? '');
        $recipe->setText($_POST['text'] ?? '');
        $recipe->setServings((int)($_POST['servings'] ?? 1));
        $recipe->setCaloriesPerServing((int)($_POST['calories_per_serving'] ?? 0));
        $recipe->setCookTime((int)($_POST['cook_time'] ?? 0));
    }
}
