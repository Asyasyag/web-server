<?php include __DIR__ . '/../header.php'; ?>
<article class="recipe">
    <p class="eyebrow">Рецепт</p>
    <h1><?= htmlspecialchars($recipe->getName()) ?></h1>
    <p class="meta">Автор: <?= htmlspecialchars($author->getNickname()) ?> · <?= $recipe->getCookTime() ?> мин · <?= $recipe->getCaloriesPerServing() ?> ккал в одной порции</p>

    <h2>Ингредиенты</h2>
    <p class="pre"><?= nl2br(htmlspecialchars($recipe->getIngredients())) ?></p>

    <h2>Приготовление</h2>
    <p><?= nl2br(htmlspecialchars($recipe->getText())) ?></p>

    <section class="calc">
        <h2>Калькулятор порций</h2>
        <p>Базовый рецепт рассчитан на <?= $recipe->getServings() ?> порций. Измени количество — калорийность пересчитается сразу.</p>
        <form method="get" action="<?= BASE_PATH ?>/recipes/<?= $recipe->getId() ?>">
            <label>Порций:
                <input type="number" name="servings" id="servings" min="1" value="<?= $servings ?>" data-per="<?= $recipe->getCaloriesPerServing() ?>">
            </label>
            <button type="submit">Пересчитать</button>
        </form>
        <p class="result">Итого: <span id="total"><?= $totalCalories ?></span> ккал</p>
    </section>

    <p><a class="btn" href="<?= BASE_PATH ?>/admin/<?= $recipe->getId() ?>/edit">Редактировать</a></p>
</article>
<script>
const input = document.getElementById('servings');
const total = document.getElementById('total');
const caloriesPerServing = Number(input.dataset.per);
input.addEventListener('input', () => {
    const value = Math.max(1, Number(input.value) || 1);
    total.textContent = value * caloriesPerServing;
});
</script>
<?php include __DIR__ . '/../footer.php'; ?>
