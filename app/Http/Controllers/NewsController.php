<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index(News $news)
    {
        return view("news.index")->with("news", $news->getAll());
    }

    public function show(News $news, int $id)
    {
        return view("news.show")->with("news", $news->getOne($id));
    }
}
