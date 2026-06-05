<?php
namespace MyProject\Models;

abstract class ActiveRecordEntity
{
    protected ?int $id = null;

    public function getId(): int
    {
        return (int)$this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
