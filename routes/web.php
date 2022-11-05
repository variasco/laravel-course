<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get("/", function ()
{
    return view("welcome");
});

Route::get("/news", [NewsController::class, "index"]);
Route::get("/news/{id}", [NewsController::class, "show"])->whereNumber("id");
Route::get("/news/create", [NewsController::class, "create"]);

Route::get("/categories", [CategoriesController::class, "index"]);
Route::get("/news/category/{id}", [CategoriesController::class, "show"])->whereNumber("id");

Route::get("/login", function ()
{
    return view("login");
});

Route::fallback(function ()
{
    return view("404");
});
