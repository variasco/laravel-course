<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NewsExport;
use App\Http\Requests\StoreNewsRequest;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->paginate(5);
        return view("admin.news.index")->with("news", $news);
    }

    public function create(Category $category, News $news)
    {
        return view("admin.news.create", ["news" => $news, "categories" => $category->all()]);
    }

    public function store(StoreNewsRequest $request, News $news)
    {
        $news->fill($request->validated())->save();
        return redirect()->route("admin.news.index")->with("success", "Новость успешно добавлена");
    }

    public function edit(News $news)
    {
        return view("admin.news.create", ["news" => $news, "categories" => Category::all()]);
    }

    public function update(StoreNewsRequest $request, News $news)
    {
        $news->fill($request->validated());
        $news->private = isset($news->private);
        $news->save();
        return redirect()->route("admin.news.index")->with("success", "Новость успешно изменена");
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route("admin.news.index")->with("success", "Новость успешно удалена");
    }



    public function download(Request $request)
    {
        if ($request->isMethod("post")) {
            $extension = $request->input("extension", "json");
            $category_id = $request->input("category_id", "all");

            switch ($extension) {
                case 'xlsx':
                    // Скачивание только всех новостей
                    return Excel::download(new NewsExport, 'news.xlsx');

                default:
                    return response()->json(
                        $category_id == "all"
                            ? News::all()
                            : Category::query()->where("id", $category_id)->first()->news()
                    )
                        ->header("Content-Disposition", 'attachment; filename = "news.json"')
                        ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            }
        }

        return view("admin.news.download")->with("categories", Category::all());
    }
}
