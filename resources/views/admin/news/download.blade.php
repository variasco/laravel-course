@extends('layouts.app')

@section('title', 'Скачивание новостей')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="col-md-5">
        <h2>Скачать новости</h2>
        <form method="POST" action="{{ route('admin.news.download') }}">
            @csrf
            <label class="form-label" for="category">Категория</label>
            <select class="form-control" name="category_id" id="category">
                <option selected value="all">Все новости</option>
                @foreach ($categories as $category)
                    <option {{ old('category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <div class="form-group mb-3">
                <label class="form-label" for="extension">Выберите тип файла</label>
                <select class="form-control" name="extension" id="extension">
                    <option selected value="json">JSON файл</option>
                    <option value="xlsx">Excel файл</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <button class="btn btn-primary mb-3" type="submit">Скачать</button>
            </div>
        </form>
    </div>
@endsection
