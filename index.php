<?php
$student = 'Сиддикова А. М.';
$group = '251-321';
$labs = [
  ['lab01/', 'Лабораторная №1', 'Hello, World! и вывод текущей даты на PHP'],
  ['lab02/', 'Лабораторная №2', 'Форма обратной связи и просмотр заголовков сервера'],
  ['lab03/', 'Лабораторная №3', 'Решение уравнения A − X = B'],
  ['lab04/', 'Лабораторная №4', 'Калькулятор выражений с обработкой на сервере'],
  ['lab05/', 'Лабораторная №5', 'Записная книжка: добавление, просмотр, редактирование и удаление'],
  ['lab06/', 'Лабораторная №6', 'ООП: наследование, инкапсуляция, интерфейсы и абстрактные классы'],
  ['lab07/', 'Лабораторная №7', 'Мини-MVC: контроллер, представление и шаблоны'],
  ['lab08/', 'Лабораторная №8', 'Роутинг в мини-приложении'],
  ['lab09/', 'Лабораторная №9', 'MVC и вывод статей из модели данных'],
  ['lab10/', 'Лабораторная №10', 'MVC CRUD: просмотр, создание и редактирование статей'],
];
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Основы серверной веб-разработки — <?= htmlspecialchars($student) ?></title>
  <link rel="stylesheet" href="assets/theme.css">
</head>
<body>
  <div class="shell">
    <header class="topbar">
      <div class="logo">АМ</div>
      <div>
        <h1>Основы серверной веб-разработки</h1>
        <p><?= htmlspecialchars($student) ?> · группа <?= htmlspecialchars($group) ?></p>
      </div>
    </header>

    <section class="hero">
      <h2>Сервер с лабораторными работами</h2>
      <p>Все задания собраны в один проект. Внешний вид переработан: новая цветовая схема, карточное меню, единая навигация и обновлённая структура файлов.</p>
    </section>

    <main class="grid">
      <?php foreach ($labs as $lab): ?>
        <a class="card" href="<?= htmlspecialchars($lab[0]) ?>">
          <span><?= htmlspecialchars($lab[1]) ?></span>
          <h3><?= htmlspecialchars($lab[2]) ?></h3>
          <p>Открыть работу на локальном сервере.</p>
        </a>
      <?php endforeach; ?>
    </main>

    <footer class="footer">Сиддикова А. М. · 251-321 · 2026</footer>
  </div>
</body>
</html>
