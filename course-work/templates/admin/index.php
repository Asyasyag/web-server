<?php include __DIR__ . '/../header.php'; ?>
<section class="panel narrow">
    <h1>Администрирование разделов</h1>
    <p>Здесь можно добавлять, редактировать и удалять карточки месяцев. Это демонстрирует итоговое CRUD-задание третьего блока курса.</p>
    <a class="btn" href="<?= BASE_PATH ?>/admin/add">+ Добавить раздел</a>
</section>

<table class="admin-table panel">
    <tr>
        <th>ID</th>
        <th>Месяц</th>
        <th>Подзаголовок</th>
        <th>Месяцев до цели</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($months as $month): ?>
        <tr>
            <td><?= $month->getId() ?></td>
            <td><a href="<?= BASE_PATH ?>/months/<?= $month->getId() ?>"><?= htmlspecialchars($month->getName()) ?></a></td>
            <td><?= htmlspecialchars($month->getSubtitle()) ?></td>
            <td><?= $month->getMonthsLeft() ?></td>
            <td>
                <a href="<?= BASE_PATH ?>/admin/<?= $month->getId() ?>/edit">Изменить</a>
                <a href="<?= BASE_PATH ?>/admin/<?= $month->getId() ?>/delete" onclick="return confirm('Удалить раздел?')">Удалить</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php include __DIR__ . '/../footer.php'; ?>
