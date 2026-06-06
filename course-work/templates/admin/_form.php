<?php
$m = $month ?? null;
$val = function (string $method, $default = '') use ($m) {
    return $m === null ? $default : htmlspecialchars((string)$m->$method());
};
?>
<form method="post" class="panel form-card">
    <label>
        Название месяца
        <input type="text" name="name" value="<?= $val('getName') ?>" required>
    </label>
    <label>
        Подзаголовок
        <input type="text" name="subtitle" value="<?= $val('getSubtitle') ?>" required>
    </label>
    <label>
        Описание
        <textarea name="description" rows="6" required><?= $val('getDescription') ?></textarea>
    </label>
    <label>
        Совет по накоплению
        <textarea name="tip" rows="4" required><?= $val('getTip') ?></textarea>
    </label>
    <label>
        Сколько месяцев остаётся до цели
        <input type="number" min="1" name="months_left" value="<?= $val('getMonthsLeft', '1') ?>" required>
    </label>
    <label>
        Эмодзи / символ
        <input type="text" name="emoji" value="<?= $val('getEmoji', '✨') ?>" required>
    </label>
    <button class="btn" type="submit">Сохранить</button>
</form>
