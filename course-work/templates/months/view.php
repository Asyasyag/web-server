<?php include __DIR__ . '/../header.php'; ?>
<section class="panel">
    <p class="badge"><?= htmlspecialchars($month->getEmoji()) ?> <?= htmlspecialchars($month->getSubtitle()) ?></p>
    <h1><?= htmlspecialchars($month->getName()) ?></h1>
    <p class="lead"><?= htmlspecialchars($month->getDescription()) ?></p>
    <p class="tip-box"><strong>Совет:</strong> <?= htmlspecialchars($month->getTip()) ?></p>
</section>

<section class="calculator-grid">
    <article class="panel calc-form">
        <h2>Калькулятор накоплений</h2>
        <p>Цель: <strong><?= number_format($goal, 0, '.', ' ') ?> ₽</strong></p>
        <form method="get" action="<?= BASE_PATH ?>/months/<?= $month->getId() ?>">
            <label>
                Уже накоплено к началу <?= mb_strtolower($month->getName(), 'UTF-8') ?>:
                <input type="number" min="0" name="saved_before" id="saved_before" value="<?= $savedBefore ?>">
            </label>
            <label>
                Планирую отложить в <?= mb_strtolower($month->getName(), 'UTF-8') ?>:
                <input type="number" min="0" name="planned_this_month" id="planned_this_month" value="<?= $plannedThisMonth ?>">
            </label>
            <button class="btn" type="submit">Рассчитать</button>
        </form>
        <p class="form-hint">Калькулятор считает сумму после текущего месяца и показывает, сколько ещё потребуется, чтобы закрыть летнюю цель.</p>
    </article>

    <article class="panel result-card">
        <h2>Результат</h2>
        <div class="result-list">
            <div><span>Рекомендуемо отложить в этом месяце:</span><strong id="recommended"><?= number_format($recommendedThisMonth, 0, '.', ' ') ?> ₽</strong></div>
            <div><span>Сумма после месяца:</span><strong id="after_this_month"><?= number_format($afterThisMonth, 0, '.', ' ') ?> ₽</strong></div>
            <div><span>Остаток до цели:</span><strong id="remaining"><?= number_format($remainingAfterThisMonth, 0, '.', ' ') ?> ₽</strong></div>
            <?php if ($nextMonths > 0): ?>
                <div><span>Нужно откладывать в следующем месяце:</span><strong id="next_need"><?= number_format($neededNextMonth, 0, '.', ' ') ?> ₽</strong></div>
            <?php else: ?>
                <div><span>Нужно закрыть остаток прямо в этом месяце:</span><strong id="next_need"><?= number_format($neededNextMonth, 0, '.', ' ') ?> ₽</strong></div>
            <?php endif; ?>
        </div>
        <div class="progress-wrap">
            <?php $progress = min(100, (int)round(($afterThisMonth / $goal) * 100)); ?>
            <div class="progress-label">Прогресс: <span id="progress_text"><?= $progress ?></span>%</div>
            <div class="progress"><span id="progress_bar" style="width: <?= $progress ?>%"></span></div>
        </div>
    </article>
</section>

<script>
(function () {
    const goal = <?= (int)$goal ?>;
    const monthsLeft = <?= (int)$month->getMonthsLeft() ?>;
    const savedInput = document.getElementById('saved_before');
    const plannedInput = document.getElementById('planned_this_month');
    const recommended = document.getElementById('recommended');
    const afterBox = document.getElementById('after_this_month');
    const remainingBox = document.getElementById('remaining');
    const nextNeedBox = document.getElementById('next_need');
    const progressText = document.getElementById('progress_text');
    const progressBar = document.getElementById('progress_bar');

    function formatNumber(n) {
        return new Intl.NumberFormat('ru-RU').format(n) + ' ₽';
    }

    function recalc() {
        let saved = parseInt(savedInput.value || '0', 10);
        let planned = parseInt(plannedInput.value || '0', 10);
        if (isNaN(saved) || saved < 0) saved = 0;
        if (isNaN(planned) || planned < 0) planned = 0;

        const recommendedThisMonth = Math.ceil(Math.max(0, goal - saved) / monthsLeft);
        const afterThisMonth = saved + planned;
        const remaining = Math.max(0, goal - afterThisMonth);
        const nextMonths = Math.max(0, monthsLeft - 1);
        const nextNeed = nextMonths > 0 ? Math.ceil(remaining / nextMonths) : remaining;
        const progress = Math.min(100, Math.round((afterThisMonth / goal) * 100));

        recommended.textContent = formatNumber(recommendedThisMonth);
        afterBox.textContent = formatNumber(afterThisMonth);
        remainingBox.textContent = formatNumber(remaining);
        nextNeedBox.textContent = formatNumber(nextNeed);
        progressText.textContent = progress;
        progressBar.style.width = progress + '%';
    }

    savedInput.addEventListener('input', recalc);
    plannedInput.addEventListener('input', recalc);
})();
</script>
<?php include __DIR__ . '/../footer.php'; ?>
