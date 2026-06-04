<?php
namespace MyProject\Models\Articles;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Services\Db;

class Article extends ActiveRecordEntity
{
    public function __construct(private string $name, private string $text, int $id = 0)
    {
        $this->id = $id;
    }

    public static function findAll(): array
    {
        $db = new Db();
        return array_map(fn(array $row) => new self($row['name'], $row['text'], (int)$row['id']), $db->all());
    }

    public static function findOneById(int $id): ?self
    {
        foreach (self::findAll() as $article) {
            if ($article->getId() === $id) {
                return $article;
            }
        }
        return null;
    }

    public static function saveFromForm(array $data, ?int $id = null): int
    {
        $db = new Db();
        $items = $db->all();
        $name = trim($data['name'] ?? '');
        $text = trim($data['text'] ?? '');
        if ($name === '' || $text === '') {
            return 0;
        }
        if ($id !== null) {
            foreach ($items as &$item) {
                if ((int)$item['id'] === $id) {
                    $item['name'] = $name;
                    $item['text'] = $text;
                    $db->saveAll($items);
                    return $id;
                }
            }
        }
        $next = empty($items) ? 1 : max(array_column($items, 'id')) + 1;
        $items[] = ['id' => $next, 'name' => $name, 'text' => $text];
        $db->saveAll($items);
        return $next;
    }

    public function getName(): string { return $this->name; }
    public function getText(): string { return $this->text; }
}
