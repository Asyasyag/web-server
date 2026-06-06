<?php include __DIR__ . '/../header.php'; ?>
<section class="hero panel">
    <div>
        <p class="badge">Курсовой проект</p>
        <h1>Накопления на лето до <?= number_format($goal, 0, '.', ' ') ?> ₽</h1>
        <p class="lead">Большая цель собирается из маленьких шагов. Этот сайт посвящён летним накоплениям: спокойному движению вперёд, аккуратному плану и ощущению, что нужная сумма становится всё ближе с каждым месяцем.</p>
        <p class="soft-text">Июнь — начать. Июль — не сбиться. Август — красиво дойти до цели. Главное не идеальный старт, а регулярность и понятный ориентир.</p>
        <div class="hero-actions">
            <a class="btn" href="<?= BASE_PATH ?>/months">Перейти к месяцам</a>
            <a class="btn secondary" href="<?= BASE_PATH ?>/admin">Редактировать разделы</a>
        </div>
    </div>
    <div class="hero-visual">
        <div class="quote-card">
            <h2>Немного мотивации</h2>
            <ul>
                <li>✨ Даже небольшая сумма — это уже движение к цели.</li>
                <li>💗 Регулярность важнее идеального начала.</li>
                <li>💸 Каждый месяц приближает к <?= number_format($goal, 0, '.', ' ') ?> ₽.</li>
            </ul>
        </div>
        <img src="<?= BASE_PATH ?>/images/anime-girl-savings.png" alt="Аниме-иллюстрация девушки с копилкой" class="hero-image subtle">
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
            <span class="link-line">Открыть раздел →</span>
        </a>
    <?php endforeach; ?>
</div>
<?php include __DIR__ . '/../footer.php'; ?>
