<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($title ?? 'Кулинарная книга') ?></title>
    <link rel="stylesheet" href="<?= BASE_PATH ?>/styles.css">
</head>
<body>
<header class="topbar">
    <a class="logo" href="<?= BASE_PATH ?>/">Кулинарная книга</a>
    <nav>
        <a href="<?= BASE_PATH ?>/">Главная</a>
        <a href="<?= BASE_PATH ?>/recipes">Рецепты</a>
        <a href="<?= BASE_PATH ?>/admin">Админка</a>
        <a href="../../">К списку работ</a>
    </nav>
</header>
<main class="container">
