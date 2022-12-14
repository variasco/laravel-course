<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("main");
Route::match(["get", "post"], "/profile", [ProfileController::class, "update"])->name("profile.update");

Route::name("news.")->prefix("/news")->group(
    function ()
    {
        Route::get("/", [NewsController::class, "index"])->name("index");
        Route::get("/categories", [CategoryController::class, "index"])->name("categories");
        Route::get("/category/{slug}", [CategoryController::class, "show"])->name("category");
        Route::get("/{news}", [NewsController::class, "show"])->name("show");
    }
);

Route::name("admin.")->prefix("/admin")->middleware("admin")->group(
    function ()
    {
        Route::match(["get", "post"], "/news/download", [AdminNewsController::class, "download"])->name("news.download");
        Route::resource("news", AdminNewsController::class);
        Route::resource("category", AdminCategoryController::class);
        Route::resource("user", AdminProfileController::class);
        Route::patch("/user/{user}/toggle", [AdminProfileController::class, "toggle"])->name("user.toggle");
    }
);

Auth::routes();
