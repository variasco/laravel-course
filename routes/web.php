<?php

use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("main");
Route::get("save", [HomeController::class, "save"])->name("save");

Route::name("news.")
    ->prefix("/news")
    ->group(function ()
    {
        Route::get("/", [NewsController::class, "index"])->name("index");
        Route::get("/categories", [CategoryController::class, "index"])->name("categories");
        Route::get("/category/{slug}", [CategoryController::class, "show"])->whereAlpha("slug")->name("category");
        Route::get("/{id}", [NewsController::class, "show"])->whereNumber("id")->name("show");
    });

Route::name("admin.")
    ->prefix("/admin")
    ->group(function ()
    {
        Route::get("/", [AdminIndexController::class, "index"])->name("main");
        Route::match(["get", "post"], "/create_news", [AdminNewsController::class, "create"])->name("create_news");
        Route::match(["get", "post"], "/download_news", [AdminNewsController::class, "download"])->name("download_news");
        Route::get("/export", [AdminNewsController::class, "export"]);
    });

Auth::routes();
