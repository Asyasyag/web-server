<?php include __DIR__ . '/../header.php'; ?>
<section class="panel narrow">
    <h1>План по месяцам</h1>
    <p>Цель проекта — накопить <strong><?= number_format($goal, 0, '.', ' ') ?> ₽</strong> за лето. Выбери месяц и открой его калькулятор.</p>
</section>

<div class="cards month-grid">
    <?php foreach ($months as $month): ?>
        <article class="card month-card">
            <div class="emoji"><?= htmlspecialchars($month->getEmoji()) ?></div>
            <h2><?= htmlspecialchars($month->getName()) ?></h2>
            <p class="muted"><?= htmlspecialchars($month->getSubtitle()) ?></p>
            <p><?= htmlspecialchars($month->getDescription()) ?></p>
            <a class="btn" href="<?= BASE_PATH ?>/months/<?= $month->getId() ?>">Калькулятор месяца</a>
        </article>
    <?php endforeach; ?>
</div>
<?php include __DIR__ . '/../footer.php'; ?>
