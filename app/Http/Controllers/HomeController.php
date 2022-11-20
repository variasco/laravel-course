<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function save(News $news, Category $category)
    {
        Storage::disk("local")->put("news.json", json_encode($news->getAll(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        Storage::disk("local")->put("categories.json", json_encode($category->getAll(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        dump("Сохранено");
    }
}
