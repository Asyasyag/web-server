<?php $isEdit = $article !== null; ?>
<h2><?= $isEdit ? 'Редактирование статьи' : 'Создание статьи' ?></h2>
<form method="post" action="?action=save<?= $isEdit ? '&id=' . $article->getId() : '' ?>">
  <div class="field"><label>Заголовок</label><input name="name" value="<?= $isEdit ? htmlspecialchars($article->getName()) : '' ?>" required></div>
  <div class="field"><label>Текст</label><textarea name="text" required><?= $isEdit ? htmlspecialchars($article->getText()) : '' ?></textarea></div>
  <button type="submit">Сохранить</button>
</form>
