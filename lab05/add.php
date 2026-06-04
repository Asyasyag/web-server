<?php
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entries = readEntries();
    $entries[] = [
        'id' => nextEntryId($entries),
        'name' => trim($_POST['name'] ?? ''),
        'phone' => trim($_POST['phone'] ?? ''),
        'email' => trim($_POST['email'] ?? ''),
        'note' => trim($_POST['note'] ?? ''),
    ];
    saveEntries($entries);
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html lang="ru">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Добавить контакт</title><link rel="stylesheet" href="styles.css"></head>
<body><div class="shell">
<header class="topbar"><div class="logo">АМ</div><div><h1>Новая запись</h1><p>Сиддикова А. М. · 251-321</p></div></header>
<?php include __DIR__ . '/menu.php'; ?>
<main class="panel">
<form method="post">
  <div class="field"><label>Имя</label><input name="name" required></div>
  <div class="field"><label>Телефон</label><input name="phone" required></div>
  <div class="field"><label>E-mail</label><input name="email" type="email" required></div>
  <div class="field"><label>Комментарий</label><textarea name="note"></textarea></div>
  <button type="submit">Сохранить</button>
</form>
</main></div></body></html>
