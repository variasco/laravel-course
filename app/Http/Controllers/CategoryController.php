<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view("news.categories")->with("categories", $category->getAll());
    }

    public function show(News $news, Category $category, string $slug)
    {
        return view("news.index")
            ->with("news", $news->getByCategorySlug($slug))
            ->with("category", $category->getOne($category->getIdBySlug($slug)));
    }
}
