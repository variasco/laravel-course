<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table("categories")->get();
        return view("news.categories")->with("categories", $categories);
    }

    public function show(string $slug)
    {
        $category = DB::table("categories")->where("slug", $slug)->get()[0];
        $news = DB::table("news")->where("category_id", $category->id)->get();
        return view("news.index")->with("news", $news)->with("category", $category);
    }
}
