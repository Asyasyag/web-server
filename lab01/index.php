<?php
$student = 'Сиддикова А. М.';
$group = '251-321';
$now = (new DateTime())->format('d.m.Y H:i:s');
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Лабораторная №1</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="shell">
    <header class="topbar">
      <a class="btn secondary" href="../">← меню</a>
      <div>
        <h1>Лабораторная работа №1</h1>
        <p><?= $student ?> · <?= $group ?></p>
      </div>
    </header>
    <main class="hero">
      <p class="meta">Задание: вывести приветствие и текущую дату средствами PHP.</p>
      <h2><?= 'Hello, World!' ?></h2>
      <div class="result">
        <b>Текущая дата и время:</b> <?= htmlspecialchars($now) ?>
      </div>
    </main>
    <footer class="footer">Задание для самостоятельной работы</footer>
  </div>
</body>
</html>
