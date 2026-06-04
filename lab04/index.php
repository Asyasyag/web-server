<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Лабораторная №4 — Калькулятор</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="shell">
    <header class="topbar">
      <a class="btn secondary" href="../">← меню</a>
      <div>
        <h1>Калькулятор</h1>
        <p>Серверная обработка выражения · Сиддикова А. М.</p>
      </div>
    </header>
    <main class="panel" style="max-width:560px;margin-inline:auto;">
      <form method="post" action="calc.php" id="calculatorForm">
        <input class="calc-display" id="display" type="text" readonly placeholder="0">
        <input id="expr" name="expr" type="hidden">
        <div class="keys">
          <button type="button" onclick="appendValue('7')">7</button>
          <button type="button" onclick="appendValue('8')">8</button>
          <button type="button" onclick="appendValue('9')">9</button>
          <button type="button" class="op" onclick="appendValue('/')">÷</button>
          <button type="button" onclick="appendValue('4')">4</button>
          <button type="button" onclick="appendValue('5')">5</button>
          <button type="button" onclick="appendValue('6')">6</button>
          <button type="button" class="op" onclick="appendValue('*')">×</button>
          <button type="button" onclick="appendValue('1')">1</button>
          <button type="button" onclick="appendValue('2')">2</button>
          <button type="button" onclick="appendValue('3')">3</button>
          <button type="button" class="op" onclick="appendValue('-')">−</button>
          <button type="button" onclick="appendValue('0')">0</button>
          <button type="button" onclick="appendValue('.')">.</button>
          <button type="button" class="op" onclick="appendValue('+')">+</button>
          <button type="button" class="op" onclick="appendValue('(')">(</button>
          <button type="button" class="op" onclick="appendValue(')')">)</button>
          <button type="button" class="clr" onclick="clearDisplay()">C</button>
          <button type="submit" class="eq" onclick="syncExpression()">=</button>
        </div>
      </form>
      <?php if (isset($_GET['result'])): ?>
        <div class="result">
          <?php if (isset($_GET['error'])): ?>
            <p class="error"><?= htmlspecialchars($_GET['result']) ?></p>
          <?php else: ?>
            <p><?= htmlspecialchars($_GET['expr'] ?? '') ?></p>
            <h2>= <?= htmlspecialchars($_GET['result']) ?></h2>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </main>
  </div>
  <script>
    const display = document.getElementById('display');
    const expr = document.getElementById('expr');
    function appendValue(value) { display.value += value; }
    function clearDisplay() { display.value = ''; }
    function syncExpression() { expr.value = display.value; }
  </script>
</body>
</html>
