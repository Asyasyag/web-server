<?php
namespace MyProject\Models\Users;

use MyProject\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
    private string $nickname;
    private string $email;
    private string $role;

    public function __construct(string $nickname = 'siddikova', string $email = 'siddikova@example.local', string $role = 'admin')
    {
        $this->id = 1;
        $this->nickname = $nickname;
        $this->email = $email;
        $this->role = $role;
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
