<?php include __DIR__ . '/../header.php'; ?>
<section class="hero panel">
    <div>
        <p class="badge">Курсовой проект · backend MVC</p>
        <h1>Накопления на лето до <?= number_format($goal, 0, '.', ' ') ?> ₽</h1>
        <p class="lead">Небольшой сайт в анимешном стиле, где цель разбита на три месяца: июнь, июль и август. В каждом разделе есть калькулятор, который показывает, сколько нужно отложить, чтобы к концу лета прийти к сумме <strong><?= number_format($goal, 0, '.', ' ') ?> ₽</strong>.</p>
        <div class="hero-actions">
            <a class="btn" href="<?= BASE_PATH ?>/months">Открыть месяцы</a>
            <a class="btn secondary" href="<?= BASE_PATH ?>/admin">Редактировать разделы</a>
        </div>
    </div>
    <div class="goal-card">
        <h2>Что реализовано</h2>
        <ul>
            <li>backend-маршрутизация на MVC-шаблоне;</li>
            <li>динамические страницы по месяцам;</li>
            <li>калькулятор накоплений с расчётом по параметрам;</li>
            <li>раздел администрирования с CRUD;</li>
            <li>хранение данных в JSON-модели.</li>
        </ul>
    </div>
</section>

<section class="section-head">
    <h2>Путь к летней цели</h2>
    <p>Три месяца — три шага к итоговой сумме.</p>
</section>

<div class="cards month-grid">
    <?php foreach ($months as $month): ?>
        <a class="card month-card" href="<?= BASE_PATH ?>/months/<?= $month->getId() ?>">
            <div class="emoji"><?= htmlspecialchars($month->getEmoji()) ?></div>
            <h3><?= htmlspecialchars($month->getName()) ?></h3>
            <p class="muted"><?= htmlspecialchars($month->getSubtitle()) ?></p>
            <p><?= htmlspecialchars($month->getTip()) ?></p>
            <span class="link-line">Открыть калькулятор →</span>
        </a>
    <?php endforeach; ?>
</div>
<?php include __DIR__ . '/../footer.php'; ?>
