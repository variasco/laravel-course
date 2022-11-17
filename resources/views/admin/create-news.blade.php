@extends('layouts.app')

@section('title', 'Создание новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <h2>Создать новую новость</h2>
    <form method="POST" action="/news/create">
        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" placeholder="Невероятная история">
        </div>
        <div class="mb-3">
            <label for="short" class="form-label">Короткое описание</label>
            <input type="text" class="form-control" id="short" placeholder="Жил был язь..."></input>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Текст</label>
            <textarea class="form-control" id="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary mb-3">Создать</button>
        </div>
    </form>
@endsection
