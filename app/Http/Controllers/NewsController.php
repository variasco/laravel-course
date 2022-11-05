<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::getAll();
        return view("news")->with("news", $news);
    }

    public function show(int $id)
    {
        $news = News::getOne($id);
        if (isset($news))
        {
            return view("news-more")->with("news", $news);
        }
        // Не нашел, как отсюда вызвать fallback
        return view("404");
    }

    public function create()
    {
        return view("create-news");
    }
}
