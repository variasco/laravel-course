@extends('layouts.app')

@section('title', 'Создание новости')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <h2>Создать новую новость</h2>
    <form method="POST" action="{{ route('admin.create_news') }}">
        @csrf
        <div class="form-group mb-3">
            <label class="form-label" for="title">Заголовок</label>
            <input class="form-control" value="{{ old('title') }}" type="text" name="title" id="title"
                placeholder="Невероятная история">
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="short">Короткое описание</label>
            <input class="form-control" value="{{ old('short') }}" type="text" name="short" id="short"
                placeholder="Жил был язь...">
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="description">Текст</label>
            <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="category">Категория</label>
            <select class="form-control" name="category_id" id="category">
                @forelse ($categories as $category)
                    <option {{ old('category') == $category['id'] ? 'selected' : '' }} value="{{ $category['id'] }}">
                        {{ $category['name'] }}
                    </option>
                @empty
                    <option value="0">Категории отсутствуют</option>
                @endforelse
            </select>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" {{ old('private') == '1' ? 'checked' : '' }} type="checkbox" id="private"
                name="private" value="1">
            <label class="form-label" for="private">Приватная</label>
        </div>
        <div class="form-group mb-3">
            <button class="btn btn-primary mb-3" type="submit">Создать</button>
        </div>
    </form>
@endsection
