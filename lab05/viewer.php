<?php
require_once __DIR__ . '/db.php';
$id = (int)($_GET['id'] ?? 0);
$entry = findEntry($id);
if (!$entry) { http_response_code(404); exit('Запись не найдена'); }
?>
<!doctype html>
<html lang="ru">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Просмотр записи</title><link rel="stylesheet" href="styles.css"></head>
<body><div class="shell">
<header class="topbar"><div class="logo">АМ</div><div><h1>Карточка контакта</h1><p>Сиддикова А. М. · 251-321</p></div></header>
<?php include __DIR__ . '/menu.php'; ?>
<main class="panel">
  <h2><?= htmlspecialchars($entry['name']) ?></h2>
  <p><b>Телефон:</b> <?= htmlspecialchars($entry['phone']) ?></p>
  <p><b>E-mail:</b> <?= htmlspecialchars($entry['email']) ?></p>
  <div class="result"><?= nl2br(htmlspecialchars($entry['note'])) ?></div>
  <div class="navline"><a class="btn" href="edit.php?id=<?= (int)$entry['id'] ?>">Редактировать</a></div>
</main></div></body></html>
