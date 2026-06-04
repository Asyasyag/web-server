<?php
namespace MyProject\Models\Articles;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Services\Db;

class Article extends ActiveRecordEntity
{
    public function __construct(private string $name, private string $text, int $id)
    {
        $this->id = $id;
    }

    public static function findAll(): array
    {
        return array_map(fn(array $row) => new self($row['name'], $row['text'], $row['id']), Db::getArticles());
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

    public function getName(): string { return $this->name; }
    public function getText(): string { return $this->text; }
}
