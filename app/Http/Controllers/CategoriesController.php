<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::getAll();
        return view("categories")->with("categories", $categories);
    }

    public function show(int $id)
    {
        $news = News::getByCategory($id);
        $category = Categories::getOne($id);
        return view("news")->with("news", $news)->with("category", $category);
    }
}
