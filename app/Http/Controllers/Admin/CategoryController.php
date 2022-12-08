<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->paginate(5);
        return view("admin.category.index")->with("categories", $categories);
    }

    public function create(Request $request, Category $category)
    {
        if ($request->isMethod("post"))
        {
            $category->fill($request->except("_token"));
            $category->slug = Str::slug($category->name);
            $category->save();
            return redirect()->route("admin.category.index")->with("success", "Категория успешно добавлена");
        }

        return view("admin.category.create", ["category" => $category]);
    }

    public function edit(Category $category)
    {
        return view("admin.category.create", ["category" => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $category->fill($request->except("_token"));
        $category->slug = Str::slug($category->name);
        $category->save();
        return redirect()->route("admin.category.index")->with("success", "Категория успешно изменена");
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("admin.category.index")->with("success", "Категория успешно удалена");
    }
}
