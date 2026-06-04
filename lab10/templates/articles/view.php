<h2><?= htmlspecialchars($article->getName()) ?></h2>
<div class="result"><?= nl2br(htmlspecialchars($article->getText())) ?></div>
<div class="navline"><a class="btn" href="?action=edit&id=<?= $article->getId() ?>">Редактировать</a></div>
