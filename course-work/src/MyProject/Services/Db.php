<?php
namespace MyProject\Services;

class Db
{
    private string $filePath;

    public function __construct()
    {
        $settings = require __DIR__ . '/../../settings.php';
        $this->filePath = $settings['storage']['months'];
    }

    public function getAll(): array
    {
        if (!is_file($this->filePath)) {
            return [];
        }

        $content = file_get_contents($this->filePath);
        $data = json_decode($content, true);
        return is_array($data) ? $data : [];
    }

    public function saveAll(array $items): void
    {
        file_put_contents(
            $this->filePath,
            json_encode(array_values($items), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );
    }
}
