@extends('layouts.main')

@section('menu')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('main') }}">Главная</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ request()->routeIs('admin.main') ? ' active' : '' }}"
            href="{{ route('admin.main') }}">Админка</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ request()->routeIs('admin.create_news') ? ' active' : '' }}"
            href="{{ route('admin.create_news') }}">Создать новость</a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ request()->routeIs('admin.download_news') ? ' active' : '' }}"
            href="{{ route('admin.download_news') }}">Скачать новости</a>
    </li>
@endsection
