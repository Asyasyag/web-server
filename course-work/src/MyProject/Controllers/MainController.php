<?php
namespace MyProject\Controllers;

use MyProject\Models\Months\MonthPlan;
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
        $settings = require __DIR__ . '/../../../src/settings.php';

        $this->view->renderHtml('main/home.php', [
            'months' => MonthPlan::findAll(),
            'title' => 'Аниме-план накоплений на лето',
            'goal' => $settings['goal'],
        ]);
    }
}
