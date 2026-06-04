<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Лабораторная №2 — Feedback Form</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="shell">
    <header class="topbar">
      <a class="btn secondary" href="../">← меню</a>
      <div>
        <h1>Лабораторная работа №2</h1>
        <p>Сиддикова А. М. · 251-321</p>
      </div>
    </header>

    <main class="panel">
      <h2>Форма обратной связи</h2>
      <p class="meta">Данные отправляются на тестовый сервис httpbin.org методом POST.</p>
      <form action="https://httpbin.org/post" method="post">
        <div class="field">
          <label for="username">Имя пользователя</label>
          <input id="username" name="username" type="text" placeholder="Введите имя" required>
        </div>
        <div class="field">
          <label for="email">E-mail</label>
          <input id="email" name="email" type="email" placeholder="student@example.com" required>
        </div>
        <div class="field">
          <label for="type">Тип обращения</label>
          <select id="type" name="type">
            <option value="question">Вопрос</option>
            <option value="suggestion">Предложение</option>
            <option value="complaint">Жалоба</option>
            <option value="thanks">Благодарность</option>
          </select>
        </div>
        <div class="field">
          <label for="message">Текст обращения</label>
          <textarea id="message" name="message" placeholder="Опишите обращение"></textarea>
        </div>
        <div class="field">
          <label>Предпочтительный способ ответа</label>
          <div class="inline">
            <label><input type="checkbox" name="response_type[]" value="email"> E-mail</label>
            <label><input type="checkbox" name="response_type[]" value="phone"> Телефон</label>
            <label><input type="checkbox" name="response_type[]" value="messenger"> Мессенджер</label>
          </div>
        </div>
        <button type="submit">Отправить</button>
      </form>
      <div class="navline">
        <a class="btn secondary" href="page2.php">Показать заголовки сервера</a>
      </div>
    </main>
  </div>
</body>
</html>
