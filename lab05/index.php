<?php
require_once __DIR__ . '/db.php';
$entries = readEntries();
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Лабораторная №5 — Записная книжка</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="shell">
  <header class="topbar">
    <div class="logo">АМ</div>
    <div>
      <h1>Записная книжка</h1>
      <p>Сиддикова А. М. · 251-321</p>
    </div>
  </header>
  <?php include __DIR__ . '/menu.php'; ?>
  <main class="panel">
    <h2>Список контактов</h2>
    <div class="table-wrap">
      <table>
        <thead>
          <tr><th>ID</th><th>Имя</th><th>Телефон</th><th>E-mail</th><th>Действия</th></tr>
        </thead>
        <tbody>
          <?php foreach ($entries as $entry): ?>
            <tr>
              <td><?= (int)$entry['id'] ?></td>
              <td><?= htmlspecialchars($entry['name']) ?></td>
              <td><?= htmlspecialchars($entry['phone']) ?></td>
              <td><?= htmlspecialchars($entry['email']) ?></td>
              <td>
                <a href="viewer.php?id=<?= (int)$entry['id'] ?>">просмотр</a> ·
                <a href="edit.php?id=<?= (int)$entry['id'] ?>">редактировать</a> ·
                <a href="delete.php?id=<?= (int)$entry['id'] ?>" onclick="return confirm('Удалить запись?')">удалить</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </main>
</div>
</body>
</html>
