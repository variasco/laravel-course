@extends('layout.main')

@section('title', 'Создание новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <h2>Создать новую новость</h2>
    <form method="POST" action="/news/create">
        <label for="title">
            <input type="text" name="title" placeholder="Название">
        </label>
        <label for="description">
            <input type="text" name="description" placeholder="Описание">
        </label>
        <label for="short">
            <input type="text" name="short" placeholder="Короткое описание">
        </label>
        <button type="submit">Создать</button>
    </form>
@endsection
