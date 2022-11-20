<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("news")->insert($this->getFakeData());
    }

    private function getFakeData()
    {
        $data = [];
        $faker = Faker\Factory::create("ru_RU");
        for ($i = 0; $i < 10; $i++)
        {
            $data[] = [
                "title" => $faker->realText(rand(10, 30)),
                "short" => $faker->realText(rand(50, 200)),
                "description" => $faker->realText(rand(1000, 5000)),
                "private" => $faker->boolean(30),
                "category_id" => $faker->biasedNumberBetween(1, 5)
            ];
        }
        return $data;
    }
}
