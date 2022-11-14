<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Categories $categories)
    {
        return view("news.categories")->with("categories", $categories->getAll());
    }

    public function show(News $news, Categories $categories, int $id)
    {
        return view("news.index")
            ->with("news", $news->getByCategory($id))
            ->with("category", $categories->getOne($id));
    }
}
