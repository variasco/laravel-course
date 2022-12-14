@extends('layouts.app')

@section('title', !$news->id ? 'Создание новости' : 'Редактирование новости')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="col-md-8">
        <div class="card-header">
            <h2>{{ !$news->id ? 'Создать новую новость' : 'Изменить новость' }}</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ !$news->id ? route('admin.news.store') : route('admin.news.update', $news) }}">
                @csrf
                @if ($news->id)
                    @method('PUT')
                @endif
                <div class="form-group mb-3">
                    <label class="form-label" for="title">Заголовок</label>
                    <input class="form-control @error('title') is-invalid @enderror"
                        value="{{ $news->title ?? old('title') }}" type="text" name="title" id="title"
                        placeholder="Невероятная история">
                    @error('title')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="short">Краткое описание</label>
                    <input class="form-control @error('short') is-invalid @enderror"
                        value="{{ $news->short ?? old('short') }}" type="text" name="short" id="short"
                        placeholder="Жил был язь...">
                    @error('short')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="description">Текст</label>
                    <textarea id="editor" class="form-control @error('description') is-invalid @enderror" name="description"
                        rows="3">
                        {{ $news->description ?? old('description') }}
                    </textarea>

                    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
                    <script>
                        CKEDITOR.replace('editor', {
                            filebrowserImageBrowseUrl: '/file-manager/ckeditor'
                        });
                    </script>

                    @error('description')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="category">Категория</label>
                    <select class="form-control" name="category_id" id="category">
                        @forelse ($categories as $category)
                            <option
                                {{ $news->category_id == $category->id || old('category_id') == $category->id ? 'selected' : '' }}
                                value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @empty
                            <option value="0">Категории отсутствуют</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" {{ $news->private == 1 || old('private') == '1' ? 'checked' : '' }}
                        type="checkbox" id="private" name="private" value="1">
                    <label class="form-label" for="private">Приватная</label>
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-primary mb-3"
                        type="submit">{{ !$news->id ? 'Добавить' : 'Сохранить' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
