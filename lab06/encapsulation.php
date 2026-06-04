<?php
class StudentProfile
{
    private string $name;
    private string $group;

    public function __construct(string $name, string $group)
    {
        $this->name = $name;
        $this->group = $group;
    }

    public function rename(string $name): void
    {
        if (trim($name) !== '') {
            $this->name = trim($name);
        }
    }

    public function getCard(): string
    {
        return $this->name . ' · группа ' . $this->group;
    }
}
$profile = new StudentProfile('Сиддикова А. М.', '251-321');
?>
<!doctype html><html lang="ru"><head><meta charset="utf-8"><title>Инкапсуляция</title><link rel="stylesheet" href="styles.css"></head><body><div class="shell"><header class="topbar"><a class="btn secondary" href="index.php">← назад</a><div><h1>Инкапсуляция</h1><p>Лабораторная №6</p></div></header><main class="panel"><div class="result"><?= htmlspecialchars($profile->getCard()) ?></div></main></div></body></html>
