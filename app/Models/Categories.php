<?php

namespace App\Models;

class Categories
{
    private static $categories = [
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

    public static function getAll(): array
    {
        return static::$categories;
    }

    public static function getOne(int $id): ?array
    {
        return static::$categories[$id] ?? null;
    }
}
