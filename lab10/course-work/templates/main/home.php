<?php include __DIR__ . '/../header.php'; ?>
<section class="hero">
    <p class="eyebrow">Курсовая работа</p>
    <h1>Мини-приложение «Кулинарная книга»</h1>
    <p>Проект показывает работу серверного PHP-приложения: маршрутизация, MVC-структура, хранение данных, CRUD-операции и расчёт калорийности.</p>
    <a class="btn" href="<?= BASE_PATH ?>/recipes">Смотреть рецепты</a>
</section>

<h2>Последние рецепты</h2>
<div class="cards">
    <?php foreach (array_slice($recipes, 0, 6) as $recipe): ?>
        <a class="card" href="<?= BASE_PATH ?>/recipes/<?= $recipe->getId() ?>">
            <span><?= $recipe->getCookTime() ?> мин</span>
            <h3><?= htmlspecialchars($recipe->getName()) ?></h3>
            <p><?= $recipe->getCaloriesPerServing() ?> ккал/порция · <?= $recipe->getServings() ?> порц.</p>
        </a>
    <?php endforeach; ?>
</div>
<?php include __DIR__ . '/../footer.php'; ?>
