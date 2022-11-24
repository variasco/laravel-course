<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("main");
Route::get("save", [HomeController::class, "save"])->name("save");

Route::name("news.")->prefix("/news")->group(function ()
{
    Route::get("/", [NewsController::class, "index"])->name("index");
    Route::get("/categories", [CategoryController::class, "index"])->name("categories");
    Route::get("/category/{slug}", [CategoryController::class, "show"])->name("category");
    Route::get("/{news}", [NewsController::class, "show"])->name("show");
});

Route::name("admin.")->prefix("/admin")->group(
    function ()
    {
        Route::name("news.")->prefix("/news")->group(
            function ()
            {
                Route::get("/", [AdminNewsController::class, "index"])->name("index");
                Route::match(["get", "post"], "/create", [AdminNewsController::class, "create"])->name("create");
                Route::get("/edit/{news}", [AdminNewsController::class, "edit"])->name("edit");
                Route::put("/update/{news}", [AdminNewsController::class, "update"])->name("update");
                Route::delete("/destroy/{news}", [AdminNewsController::class, "destroy"])->name("destroy");
                Route::match(["get", "post"], "/download", [AdminNewsController::class, "download"])->name("download");
            }
        );
        Route::name("category.")->prefix("/category")->group(
            function ()
            {
                Route::get("/", [AdminCategoryController::class, "index"])->name("index");
                Route::match(["get", "post"], "/create", [AdminCategoryController::class, "create"])->name("create");
                Route::get("/edit/{category}", [AdminCategoryController::class, "edit"])->name("edit");
                Route::put("/update/{category}", [AdminCategoryController::class, "update"])->name("update");
                Route::delete("/destroy/{category}", [AdminCategoryController::class, "destroy"])->name("destroy");
            }
        );
    }
);

Auth::routes();
