<?php
abstract class ReportBlock
{
    public function render(): string
    {
        return '<section class="result"><h2>' . htmlspecialchars($this->heading()) . '</h2><p>' . htmlspecialchars($this->text()) . '</p></section>';
    }
    abstract protected function heading(): string;
    abstract protected function text(): string;
}
class StudentReport extends ReportBlock
{
    protected function heading(): string { return 'Сведения о работе'; }
    protected function text(): string { return 'Сиддикова А. М., группа 251-321. Пример абстрактного класса выполнен.'; }
}
$report = new StudentReport();
?>
<!doctype html><html lang="ru"><head><meta charset="utf-8"><title>Абстрактный класс</title><link rel="stylesheet" href="styles.css"></head><body><div class="shell"><header class="topbar"><a class="btn secondary" href="index.php">← назад</a><div><h1>Абстрактный класс</h1><p>Лабораторная №6</p></div></header><main class="panel"><?= $report->render() ?></main></div></body></html>
