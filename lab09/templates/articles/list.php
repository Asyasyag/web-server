<h2>Список статей</h2>
<div class="grid">
<?php foreach ($articles as $article): ?>
  <a class="card" href="?id=<?= $article->getId() ?>"><span>#<?= $article->getId() ?></span><h3><?= htmlspecialchars($article->getName()) ?></h3><p><?= htmlspecialchars($article->getText()) ?></p></a>
<?php endforeach; ?>
</div>
