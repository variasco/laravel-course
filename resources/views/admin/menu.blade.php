aaaaa@extends('layouts.main')

@section('menu')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('main') }}">Главная</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ request()->routeIs('admin.news.index') ? ' active' : '' }}"
            href="{{ route('admin.news.index') }}">Новости</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ request()->routeIs('admin.category.index') ? ' active' : '' }}"
            href="{{ route('admin.category.index') }}">Категории</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ request()->routeIs('admin.user.index') ? ' active' : '' }}"
            href="{{ route('admin.user.index') }}">Профили</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ request()->routeIs('admin.news.create') ? ' active' : '' }}"
            href="{{ route('admin.news.create') }}">Создать новость</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ request()->routeIs('admin.category.create') ? ' active' : '' }}"
            href="{{ route('admin.category.create') }}">Создать категорию</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ request()->routeIs('admin.news.download') ? ' active' : '' }}"
            href="{{ route('admin.news.download') }}">Скачать новости</a>
    </li>
@endsection
