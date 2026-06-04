<?php
require_once __DIR__ . '/db.php';
$id = (int)($_GET['id'] ?? 0);
$entries = array_values(array_filter(readEntries(), fn(array $entry): bool => (int)$entry['id'] !== $id));
saveEntries($entries);
header('Location: index.php');
exit;
