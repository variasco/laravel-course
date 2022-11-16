<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get("/", function ()
{
    return view("welcome");
})->name("home");

Route::name("news.")
    ->prefix("news")
    ->group(function ()
    {
        Route::get("/", [NewsController::class, "index"])->name("index");
        Route::get("/categories", [CategoryController::class, "index"])->name("categories");
        Route::get("/category/{slug}", [CategoryController::class, "show"])->whereAlpha("slug")->name("category");
        Route::get("/{id}", [NewsController::class, "show"])->whereNumber("id")->name("show");
    });

Route::name("admin.")
    ->prefix("admin")
    ->group(function ()
    {
        Route::get("/create_news", function ()
        {
            return view("admin.create-news");
        })->name("create_news");
    });


Route::get("/login", function ()
{
    return view("login");
})->name("login");

Route::fallback(function ()
{
    return view("404");
})->name("fallback");
