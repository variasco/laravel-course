@extends('layouts.main')

@section('menu')
    <li class="nav-item"><a class="nav-link{{ request()->routeIs('main') ? ' active' : '' }}"
            href="{{ route('main') }}">Главная</a></li>
    <li class="nav-item"><a class="nav-link{{ request()->routeIs('news.index') ? ' active' : '' }}"
            href="{{ route('news.index') }}">Новости</a></li>
    <li class="nav-item"><a class="nav-link{{ request()->routeIs('news.categories') ? ' active' : '' }}"
            href="{{ route('news.categories') }}">Категории</a></li>
    <li class="nav-item"><a class="nav-link{{ request()->routeIs('admin.main') ? ' active' : '' }}"
            href="{{ route('admin.news.index') }}">Админка</a></li>
@endsection
