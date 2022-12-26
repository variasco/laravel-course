<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("resources")->insert([
            [
                "name" => "lenta.ru",
                "source" => "https://lenta.ru/rss",
            ],
            [
                "name" => "rbc.ru",
                "source" => "https://rssexport.rbc.ru/rbcnews/news/30/full.rss",
            ],
        ]);
    }
}
