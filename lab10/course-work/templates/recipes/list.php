<?php include __DIR__ . '/../header.php'; ?>
<h1>Все рецепты</h1>
<?php if (empty($recipes)): ?>
    <p class="notice">Пока нет ни одного рецепта.</p>
<?php else: ?>
    <div class="cards">
        <?php foreach ($recipes as $recipe): ?>
            <a class="card" href="<?= BASE_PATH ?>/recipes/<?= $recipe->getId() ?>">
                <span><?= $recipe->getCookTime() ?> мин</span>
                <h3><?= htmlspecialchars($recipe->getName()) ?></h3>
                <p><?= $recipe->getCaloriesPerServing() ?> ккал/порция · <?= $recipe->getServings() ?> порц.</p>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php include __DIR__ . '/../footer.php'; ?>
