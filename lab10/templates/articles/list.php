<h2>Статьи</h2>
<div class="grid">
<?php foreach ($articles as $article): ?>
  <a class="card" href="?action=view&id=<?= $article->getId() ?>"><span>#<?= $article->getId() ?></span><h3><?= htmlspecialchars($article->getName()) ?></h3><p><?= htmlspecialchars(strlen($article->getText()) > 90 ? substr($article->getText(), 0, 90) . '...' : $article->getText()) ?></p></a>
<?php endforeach; ?>
</div>
