<?php
class CourseWork
{
    public function title(): string { return 'Серверная веб-разработка'; }
    public function status(): string { return 'работа подготовлена'; }
}
class LaboratoryWork extends CourseWork
{
    public function title(): string { return 'Лабораторная работа по PHP'; }
}
$work = new LaboratoryWork();
?>
<!doctype html><html lang="ru"><head><meta charset="utf-8"><title>Наследование</title><link rel="stylesheet" href="styles.css"></head><body><div class="shell"><header class="topbar"><a class="btn secondary" href="index.php">← назад</a><div><h1>Наследование</h1><p>Сиддикова А. М.</p></div></header><main class="panel"><p><b><?= htmlspecialchars($work->title()) ?></b></p><p><?= htmlspecialchars($work->status()) ?></p></main></div></body></html>
