<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->paginate(5);
        return view("admin.category.index")->with("categories", $categories);
    }

    public function create(Category $category)
    {
        return view("admin.category.create", ["category" => $category]);
    }

    public function store(StoreCategoryRequest $request, Category $category)
    {
        $category->fill($request->validated());
        $category->slug = Str::slug($category->name);
        $category->save();
        return redirect()->route("admin.category.index")->with("success", "Категория успешно добавлена");
    }

    public function edit(Category $category)
    {
        return view("admin.category.create", ["category" => $category]);
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        $category->fill($request->validated());
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
