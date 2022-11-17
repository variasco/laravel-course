@extends('layouts.main')

@section('menu')
    <li class="nav-item"><a class="nav-link" href="{{ route('main') }}">Главная</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('news.index') }}">Новости</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('news.categories') }}">Категории</a></li>
    {{-- <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Вход</a></li> --}}
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.create_news') }}">Создать новость</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('react') }}">React</a></li>
@endsection
