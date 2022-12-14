<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
                "name" => "admin",
                "email" => "admin@admin.ru",
                "password" => "$2y$10\$oxBlhMzfSHyY0EXNgrTGCOTIn7W6K/TGcKpBLsHq3rWn8vvgSpQGq",
                "admin" => true
            ],
            [
                "name" => "admin2",
                "email" => "admin2@admin.ru",
                "password" => "$2y$10\$oxBlhMzfSHyY0EXNgrTGCOTIn7W6K/TGcKpBLsHq3rWn8vvgSpQGq",
                "admin" => true
            ],
            [
                "name" => "user",
                "email" => "user@user.ru",
                "password" => "$2y$10\$oxBlhMzfSHyY0EXNgrTGCOTIn7W6K/TGcKpBLsHq3rWn8vvgSpQGq",
                "admin" => false
            ]
        ]);
    }
}
