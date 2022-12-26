@extends('layouts.app')

@section('title', !$category->id ? 'Создание категории' : 'Редактирование категории')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="col-md-5">
        <div class="card-header">
            <h2>{{ !$category->id ? 'Создать новую категорию' : 'Изменить категорию' }}</h2>
        </div>
        <div class="card-body">
            <form method="POST"
                action="{{ !$category->id ? route('admin.category.store') : route('admin.category.update', $category) }}">
                @csrf
                @if ($category->id)
                    @method('PUT')
                @endif
                <div class="form-group mb-3">
                    <label class="form-label" for="title">Название</label>
                    <input class="form-control @error('name') is-invalid @enderror"
                        value="{{ $category->name ?? old('name') }}" type="text" name="name" id="name"
                        placeholder="Политика">
                    @error('name')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-primary mb-3"
                        type="submit">{{ !$category->id ? 'Добавить' : 'Изменить' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
