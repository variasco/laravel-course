<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view("news.categories")->with("categories", $categories);
    }

    public function show(string $slug)
    {
        $category = Category::query()->where("slug", $slug)->first();
        $news = $category->news();
        return view("news.index")->with("news", $news)->with("category", $category);
    }
}
