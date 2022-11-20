@extends('layouts.app')

@section('title')
    @parent Новости {{ $category->name ?? '' }}
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <h2>Новости {{ $category->name ?? '' }}</h2>
    @forelse ($news as $item)
        <a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a><br>
    @empty
        <p>Новостей нет</p>
    @endforelse
@endsection
