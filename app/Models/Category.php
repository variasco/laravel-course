<?php

namespace App\Models;

class Category
{
    private array $categories = [
        1 => [
            "id" => 1,
            "name" => "Политика",
            "slug" => "politic"
        ],
        2 => [
            "id" => 2,
            "name" => "Спорт",
            "slug" => "sport"
        ],
        3 => [
            "id" => 3,
            "name" => "Наука и технологии",
            "slug" => "science"
        ],
        4 => [
            "id" => 4,
            "name" => "Экономика",
            "slug" => "economic"
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

    public function getIdBySlug(string $slug): ?int
    {
        $id = null;
        foreach ($this->getAll() as $category)
        {
            if ($category["slug"] == $slug)
            {
                $id = $category["id"];
                break;
            }
        }
        return $id;
    }
}
