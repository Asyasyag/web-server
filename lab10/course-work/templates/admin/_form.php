<?php
$r = $recipe ?? null;
$value = function (string $method, string $default = '') use ($r): string {
    return $r === null ? $default : htmlspecialchars((string)$r->$method());
};
?>
<form method="post" class="form-card">
    <label>Название
        <input type="text" name="name" value="<?= $value('getName') ?>" required>
    </label>

    <label>Ингредиенты, каждый с новой строки
        <textarea name="ingredients" rows="5" required><?= $value('getIngredients') ?></textarea>
    </label>

    <label>Приготовление
        <textarea name="text" rows="8" required><?= $value('getText') ?></textarea>
    </label>

    <div class="form-row">
        <label>Порций
            <input type="number" name="servings" min="1" value="<?= $value('getServings', '1') ?>" required>
        </label>
        <label>Ккал/порц.
            <input type="number" name="calories_per_serving" min="0" value="<?= $value('getCaloriesPerServing', '0') ?>" required>
        </label>
        <label>Время, мин
            <input type="number" name="cook_time" min="0" value="<?= $value('getCookTime', '0') ?>" required>
        </label>
    </div>

    <button type="submit">Сохранить</button>
</form>
