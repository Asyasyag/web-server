<?php
namespace MyProject\Models;

abstract class ActiveRecordEntity
{
    protected int $id;
    public function getId(): int { return $this->id; }
}
