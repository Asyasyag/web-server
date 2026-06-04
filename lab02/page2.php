<?php
$url = 'https://www.example.com';
$headers = @get_headers($url) ?: ['Не удалось получить заголовки. Проверьте подключение к интернету или настройки PHP.'];
$output = implode("\n", $headers);
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Заголовки сервера</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="shell">
    <header class="topbar">
      <a class="btn secondary" href="index.php">← назад</a>
      <div>
        <h1>Ответ сервера</h1>
        <p>get_headers() · Сиддикова А. М.</p>
      </div>
    </header>
    <main class="panel">
      <h2>Заголовки ответа для <?= htmlspecialchars($url) ?></h2>
      <div class="codebox"><?= htmlspecialchars($output) ?></div>
    </main>
  </div>
</body>
</html>
