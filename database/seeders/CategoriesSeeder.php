<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categories")->insert($this->getData());
    }

    private function getData()
    {
        return [
            [
                "name" => "Политика",
                "slug" => "politic"
            ],
            [
                "name" => "Спорт",
                "slug" => "sport"
            ],
            [
                "name" => "Наука и технологии",
                "slug" => "science"
            ],
            [
                "name" => "Экономика",
                "slug" => "economic"
            ],
            [
                "name" => "Культура",
                "slug" => "culture"
            ]
        ];
    }
}
