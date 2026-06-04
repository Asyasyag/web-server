<?php
require_once __DIR__ . '/db.php';
$id = (int)($_GET['id'] ?? 0);
$entry = findEntry($id);
if (!$entry) { http_response_code(404); exit('Запись не найдена'); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entries = readEntries();
    foreach ($entries as &$item) {
        if ((int)$item['id'] === $id) {
            $item['name'] = trim($_POST['name'] ?? '');
            $item['phone'] = trim($_POST['phone'] ?? '');
            $item['email'] = trim($_POST['email'] ?? '');
            $item['note'] = trim($_POST['note'] ?? '');
            break;
        }
    }
    saveEntries($entries);
    header('Location: viewer.php?id=' . $id);
    exit;
}
?>
<!doctype html>
<html lang="ru">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Редактирование</title><link rel="stylesheet" href="styles.css"></head>
<body><div class="shell">
<header class="topbar"><div class="logo">АМ</div><div><h1>Редактирование записи</h1><p>Сиддикова А. М. · 251-321</p></div></header>
<?php include __DIR__ . '/menu.php'; ?>
<main class="panel">
<form method="post">
  <div class="field"><label>Имя</label><input name="name" value="<?= htmlspecialchars($entry['name']) ?>" required></div>
  <div class="field"><label>Телефон</label><input name="phone" value="<?= htmlspecialchars($entry['phone']) ?>" required></div>
  <div class="field"><label>E-mail</label><input name="email" type="email" value="<?= htmlspecialchars($entry['email']) ?>" required></div>
  <div class="field"><label>Комментарий</label><textarea name="note"><?= htmlspecialchars($entry['note']) ?></textarea></div>
  <button type="submit">Обновить</button>
</form>
</main></div></body></html>
