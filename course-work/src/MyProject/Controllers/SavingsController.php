<?php
namespace MyProject\Controllers;

use MyProject\Models\Months\MonthPlan;
use MyProject\View\View;

class SavingsController
{
    private View $view;
    private int $goal;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
        $settings = require __DIR__ . '/../../../src/settings.php';
        $this->goal = (int)$settings['goal'];
    }

    public function index(): void
    {
        $this->view->renderHtml('months/list.php', [
            'months' => MonthPlan::findAll(),
            'title' => 'План по месяцам',
            'goal' => $this->goal,
        ]);
    }

    public function show(int $monthId): void
    {
        $month = MonthPlan::getById($monthId);
        if ($month === null) {
            http_response_code(404);
            $this->view->renderHtml('errors/404.php', ['title' => 'Раздел не найден']);
            return;
        }

        $savedBefore = isset($_GET['saved_before']) ? max(0, (int)$_GET['saved_before']) : 0;
        $plannedThisMonth = isset($_GET['planned_this_month']) ? max(0, (int)$_GET['planned_this_month']) : 0;

        $monthsLeft = $month->getMonthsLeft();
        $recommendedThisMonth = (int)ceil(max(0, $this->goal - $savedBefore) / $monthsLeft);
        $afterThisMonth = $savedBefore + $plannedThisMonth;
        $remainingAfterThisMonth = max(0, $this->goal - $afterThisMonth);
        $nextMonths = max(0, $monthsLeft - 1);
        $neededNextMonth = $nextMonths > 0
            ? (int)ceil($remainingAfterThisMonth / $nextMonths)
            : $remainingAfterThisMonth;

        $this->view->renderHtml('months/view.php', [
            'month' => $month,
            'goal' => $this->goal,
            'savedBefore' => $savedBefore,
            'plannedThisMonth' => $plannedThisMonth,
            'recommendedThisMonth' => $recommendedThisMonth,
            'afterThisMonth' => $afterThisMonth,
            'remainingAfterThisMonth' => $remainingAfterThisMonth,
            'nextMonths' => $nextMonths,
            'neededNextMonth' => $neededNextMonth,
            'title' => $month->getName() . ' — накопления на лето',
        ]);
    }

    public function admin(): void
    {
        $this->view->renderHtml('admin/index.php', [
            'months' => MonthPlan::findAll(),
            'title' => 'Администрирование разделов',
        ]);
    }

    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $month = new MonthPlan();
            $this->fillFromPost($month);
            $month->save();
            header('Location: ' . BASE_PATH . '/admin');
            return;
        }

        $this->view->renderHtml('admin/add.php', ['title' => 'Новый раздел']);
    }

    public function edit(int $monthId): void
    {
        $month = MonthPlan::getById($monthId);
        if ($month === null) {
            http_response_code(404);
            $this->view->renderHtml('errors/404.php', ['title' => 'Раздел не найден']);
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->fillFromPost($month);
            $month->save();
            header('Location: ' . BASE_PATH . '/months/' . $month->getId());
            return;
        }

        $this->view->renderHtml('admin/edit.php', [
            'month' => $month,
            'title' => 'Редактирование раздела',
        ]);
    }

    public function delete(int $monthId): void
    {
        $month = MonthPlan::getById($monthId);
        if ($month !== null) {
            $month->delete();
        }
        header('Location: ' . BASE_PATH . '/admin');
    }

    private function fillFromPost(MonthPlan $month): void
    {
        $month->setName($_POST['name'] ?? '');
        $month->setSubtitle($_POST['subtitle'] ?? '');
        $month->setDescription($_POST['description'] ?? '');
        $month->setTip($_POST['tip'] ?? '');
        $month->setMonthsLeft((int)($_POST['months_left'] ?? 1));
        $month->setEmoji($_POST['emoji'] ?? '✨');
    }
}
