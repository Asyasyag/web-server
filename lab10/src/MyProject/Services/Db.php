<?php
namespace MyProject\Services;

class Db
{
    private string $file;

    public function __construct()
    {
        $settings = require __DIR__ . '/../../settings.php';
        $this->file = $settings['storage'];
    }

    public function all(): array
    {
        $json = file_get_contents($this->file);
        $items = json_decode($json ?: '[]', true);
        return is_array($items) ? $items : [];
    }

    public function saveAll(array $items): void
    {
        file_put_contents($this->file, json_encode(array_values($items), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}
