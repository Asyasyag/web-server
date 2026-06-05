<?php
namespace MyProject\Models\Recipes;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Services\Db;

class Recipe extends ActiveRecordEntity
{
    private int $authorId = 1;
    private string $name = '';
    private string $ingredients = '';
    private string $text = '';
    private int $servings = 1;
    private int $caloriesPerServing = 0;
    private int $cookTime = 0;
    private string $createdAt = '';

    public static function fromArray(array $row): self
    {
        $recipe = new self();
        $recipe->id = (int)($row['id'] ?? 0);
        $recipe->authorId = (int)($row['author_id'] ?? 1);
        $recipe->name = (string)($row['name'] ?? 'Без названия');
        $recipe->ingredients = (string)($row['ingredients'] ?? '');
        $recipe->text = (string)($row['text'] ?? '');
        $recipe->servings = max(1, (int)($row['servings'] ?? 1));
        $recipe->caloriesPerServing = max(0, (int)($row['calories_per_serving'] ?? 0));
        $recipe->cookTime = max(0, (int)($row['cook_time'] ?? 0));
        $recipe->createdAt = (string)($row['created_at'] ?? date('Y-m-d H:i:s'));
        return $recipe;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'author_id' => $this->authorId,
            'name' => $this->name,
            'ingredients' => $this->ingredients,
            'text' => $this->text,
            'servings' => $this->servings,
            'calories_per_serving' => $this->caloriesPerServing,
            'cook_time' => $this->cookTime,
            'created_at' => $this->createdAt ?: date('Y-m-d H:i:s'),
        ];
    }

    public static function findAll(): array
    {
        $rows = (new Db())->getAll();
        usort($rows, fn(array $a, array $b): int => ($b['id'] ?? 0) <=> ($a['id'] ?? 0));
        return array_map(fn(array $row): self => self::fromArray($row), $rows);
    }

    public static function getById(int $id): ?self
    {
        foreach ((new Db())->getAll() as $row) {
            if ((int)($row['id'] ?? 0) === $id) {
                return self::fromArray($row);
            }
        }
        return null;
    }

    public function save(): void
    {
        $db = new Db();
        $rows = $db->getAll();

        if ($this->id === null || $this->id === 0) {
            $ids = array_column($rows, 'id');
            $this->id = empty($ids) ? 1 : max($ids) + 1;
            $this->createdAt = date('Y-m-d H:i:s');
            $rows[] = $this->toArray();
        } else {
            foreach ($rows as $index => $row) {
                if ((int)$row['id'] === $this->id) {
                    $rows[$index] = $this->toArray();
                    $db->saveAll($rows);
                    return;
                }
            }
            $rows[] = $this->toArray();
        }

        $db->saveAll($rows);
    }

    public function delete(): void
    {
        $db = new Db();
        $rows = array_filter($db->getAll(), fn(array $row): bool => (int)$row['id'] !== $this->id);
        $db->saveAll($rows);
    }

    public function getAuthorId(): int { return $this->authorId; }
    public function getName(): string { return $this->name; }
    public function getIngredients(): string { return $this->ingredients; }
    public function getText(): string { return $this->text; }
    public function getServings(): int { return $this->servings; }
    public function getCaloriesPerServing(): int { return $this->caloriesPerServing; }
    public function getCookTime(): int { return $this->cookTime; }

    public function setAuthorId(int $authorId): void { $this->authorId = $authorId; }
    public function setName(string $name): void { $this->name = trim($name); }
    public function setIngredients(string $ingredients): void { $this->ingredients = trim($ingredients); }
    public function setText(string $text): void { $this->text = trim($text); }
    public function setServings(int $servings): void { $this->servings = max(1, $servings); }
    public function setCaloriesPerServing(int $calories): void { $this->caloriesPerServing = max(0, $calories); }
    public function setCookTime(int $cookTime): void { $this->cookTime = max(0, $cookTime); }
}
