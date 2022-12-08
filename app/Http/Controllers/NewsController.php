<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view("news.index")->with("news", $news);
    }

    public function show(News $news)
    {
        return view("news.show")->with("news", $news);
    }
}
