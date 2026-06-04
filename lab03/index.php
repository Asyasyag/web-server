<?php
$a = filter_input(INPUT_POST, 'a', FILTER_VALIDATE_FLOAT);
$b = filter_input(INPUT_POST, 'b', FILTER_VALIDATE_FLOAT);
$a = $a === false || $a === null ? 27 : $a;
$b = $b === false || $b === null ? 17 : $b;
$x = $a - $b;
$isPost = $_SERVER['REQUEST_METHOD'] === 'POST';
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Лабораторная №3</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="shell">
    <header class="topbar">
      <a class="btn secondary" href="../">← меню</a>
      <div>
        <h1>Решение уравнения</h1>
        <p>Вариант 2 · Сиддикова А. М. · 251-321</p>
      </div>
    </header>
    <main class="panel">
      <h2>A − X = B</h2>
      <form method="post">
        <div class="inline">
          <div class="field">
            <label for="a">A</label>
            <input id="a" name="a" type="number" step="any" value="<?= htmlspecialchars((string)$a) ?>">
          </div>
          <div class="field">
            <label for="b">B</label>
            <input id="b" name="b" type="number" step="any" value="<?= htmlspecialchars((string)$b) ?>">
          </div>
        </div>
        <button type="submit">Решить</button>
      </form>
      <?php if ($isPost): ?>
        <section class="result">
          <p><b>Уравнение:</b> <?= htmlspecialchars((string)$a) ?> − X = <?= htmlspecialchars((string)$b) ?></p>
          <p><b>Формула:</b> X = A − B</p>
          <p><b>Ответ:</b> X = <?= htmlspecialchars((string)$x) ?></p>
          <p class="small">Проверка: <?= htmlspecialchars((string)$a) ?> − <?= htmlspecialchars((string)$x) ?> = <?= htmlspecialchars((string)($a - $x)) ?></p>
        </section>
      <?php endif; ?>
    </main>
  </div>
</body>
</html>
