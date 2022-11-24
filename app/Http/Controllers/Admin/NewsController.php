<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NewsExport;
use App\Exports\UsersExport;

class NewsController extends Controller
{
    public function create(Request $request, Category $category)
    {
        if ($request->isMethod("post"))
        {
            $news = $request->except("_token");
            $news['private'] = isset($news['private']);

            $oldNews = json_decode(Storage::disk("local")->get("news.json"), true);
            $newId = array_key_last($oldNews) + 1;
            $news["id"] = $newId;
            $oldNews[$newId] = $news;

            Storage::disk("local")->put('news.json', json_encode($oldNews, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            return redirect()->route("news.show", $newId)->with("success", "Новость успешно добавлена");
        }

        return view("admin.create_news")->with("categories", $category->getAll());
    }

    public function download(Request $request, News $news, Category $category)
    {
        if ($request->isMethod("post"))
        {
            $extension = $request->input("extension", "json");
            $category_id = $request->input("category_id", "all");

            switch ($extension)
            {
                case 'xlsx':
                    // Выдает ошибку, так как в классе NewsExport должен быть вызван метод all() у модели. А такого метода нет. Так как реализация идет через файлы и собственные манипуляции с данными. Получение юзеров в excel работает как и описано в документации. 
                    return Excel::download(new NewsExport, 'news.xlsx');

                default:
                    return response()->json($category_id == "all" ? $news->getAll() : $news->getByCategory($category_id))
                        ->header("Content-Disposition", 'attachment; filename = "news.json"')
                        ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            }
        }

        return view("admin.download_news")->with("categories", $category->getAll());
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
