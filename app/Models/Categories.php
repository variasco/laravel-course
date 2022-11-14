<?php

namespace App\Models;

class Categories
{
    private array $categories = [
        1 => [
            "id" => 1,
            "name" => "Политика",
        ],
        2 => [
            "id" => 2,
            "name" => "Спорт",
        ],
        3 => [
            "id" => 3,
            "name" => "Наука и технологии",
        ],
        4 => [
            "id" => 4,
            "name" => "Экономика",
        ],
    ];

    public function getAll(): array
    {
        return $this->categories;
    }

    public function getOne(int $id): ?array
    {
        return $this->getAll()[$id] ?? null;
    }
}
