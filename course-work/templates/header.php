<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($title ?? 'Курсовой проект') ?></title>
    <link rel="stylesheet" href="<?= BASE_PATH ?>/styles.css">
</head>
<body>
<div class="page-shell">
    <header class="topbar">
        <a class="brand" href="<?= BASE_PATH ?>/">🌸 Summer Save Anime</a>
        <nav class="main-nav">
            <a href="<?= BASE_PATH ?>/">Главная</a>
            <a href="<?= BASE_PATH ?>/months">Месяцы</a>
            <a href="<?= BASE_PATH ?>/admin">Админка</a>
        </nav>
    </header>
    <main class="container">
