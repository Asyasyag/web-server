<?php
namespace MyProject\Models\Months;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Services\Db;

class MonthPlan extends ActiveRecordEntity
{
    private string $name = '';
    private string $subtitle = '';
    private string $description = '';
    private string $tip = '';
    private int $monthsLeft = 1;
    private string $emoji = '✨';

    public static function fromArray(array $row): self
    {
        $plan = new self();
        $plan->id = (int)($row['id'] ?? 0);
        $plan->name = (string)($row['name'] ?? 'Месяц');
        $plan->subtitle = (string)($row['subtitle'] ?? '');
        $plan->description = (string)($row['description'] ?? '');
        $plan->tip = (string)($row['tip'] ?? '');
        $plan->monthsLeft = max(1, (int)($row['months_left'] ?? 1));
        $plan->emoji = (string)($row['emoji'] ?? '✨');
        return $plan;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'subtitle' => $this->subtitle,
            'description' => $this->description,
            'tip' => $this->tip,
            'months_left' => $this->monthsLeft,
            'emoji' => $this->emoji,
        ];
    }

    public static function findAll(): array
    {
        $rows = (new Db())->getAll();
        usort($rows, fn(array $a, array $b): int => ($a['id'] ?? 0) <=> ($b['id'] ?? 0));
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
            $rows[] = $this->toArray();
            $db->saveAll($rows);
            return;
        }

        foreach ($rows as $index => $row) {
            if ((int)($row['id'] ?? 0) === $this->id) {
                $rows[$index] = $this->toArray();
                $db->saveAll($rows);
                return;
            }
        }

        $rows[] = $this->toArray();
        $db->saveAll($rows);
    }

    public function delete(): void
    {
        $db = new Db();
        $rows = array_filter($db->getAll(), fn(array $row): bool => (int)($row['id'] ?? 0) !== $this->id);
        $db->saveAll($rows);
    }

    public function getName(): string { return $this->name; }
    public function getSubtitle(): string { return $this->subtitle; }
    public function getDescription(): string { return $this->description; }
    public function getTip(): string { return $this->tip; }
    public function getMonthsLeft(): int { return $this->monthsLeft; }
    public function getEmoji(): string { return $this->emoji; }

    public function setName(string $name): void { $this->name = trim($name); }
    public function setSubtitle(string $subtitle): void { $this->subtitle = trim($subtitle); }
    public function setDescription(string $description): void { $this->description = trim($description); }
    public function setTip(string $tip): void { $this->tip = trim($tip); }
    public function setMonthsLeft(int $monthsLeft): void { $this->monthsLeft = max(1, $monthsLeft); }
    public function setEmoji(string $emoji): void { $this->emoji = trim($emoji) ?: '✨'; }
}
