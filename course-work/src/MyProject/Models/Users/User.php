<?php
namespace MyProject\Models\Users;

use MyProject\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
    private string $nickname;

    public function __construct(string $nickname = 'Сиддикова А. М.')
    {
        $this->id = 1;
        $this->nickname = $nickname;
    }

    public static function getById(int $id): self
    {
        return new self();
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }
}
