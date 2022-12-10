<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\News;
use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Category $category)
    {
        $categoryTableName = $category->getTable();
        return [
            "title" => "required|min:3|max:255",
            "short" => "required|min:3|max:255",
            "description" => "required|min:3",
            "private" => "sometimes|in:1",
            "category_id" => "required|exists:${categoryTableName},id"
        ];
    }
}
