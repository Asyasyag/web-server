<?php
declare(strict_types=1);

const STORAGE_FILE = __DIR__ . '/data/notebook.json';

function seedNotebook(): void
{
    if (file_exists(STORAGE_FILE)) {
        return;
    }
    $items = [
        ['id' => 1, 'name' => 'Сиддикова А. М.', 'phone' => '+7 900 000-00-00', 'email' => 'siddikova@example.com', 'note' => 'Учебная запись'],
        ['id' => 2, 'name' => 'Учебный отдел', 'phone' => '+7 495 000-00-00', 'email' => 'study@example.com', 'note' => 'Контакт для проверки работы'],
    ];
    saveEntries($items);
}

function readEntries(): array
{
    seedNotebook();
    $json = file_get_contents(STORAGE_FILE);
    $data = json_decode($json ?: '[]', true);
    return is_array($data) ? $data : [];
}

function saveEntries(array $entries): void
{
    if (!is_dir(dirname(STORAGE_FILE))) {
        mkdir(dirname(STORAGE_FILE), 0777, true);
    }
    file_put_contents(STORAGE_FILE, json_encode(array_values($entries), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function findEntry(int $id): ?array
{
    foreach (readEntries() as $entry) {
        if ((int)$entry['id'] === $id) {
            return $entry;
        }
    }
    return null;
}

function nextEntryId(array $entries): int
{
    $ids = array_column($entries, 'id');
    return $ids ? max($ids) + 1 : 1;
}
