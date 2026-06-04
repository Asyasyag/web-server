<?php
namespace MyProject\Models\Users;

class User
{
    public function __construct(private string $name, private string $group) {}
    public function getSignature(): string { return $this->name . ' · ' . $this->group; }
}
