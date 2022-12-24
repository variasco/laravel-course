@extends('layouts.app')

@section('title', $news->title ?? 'Новость не существует')

@section('menu')
    @include('menu')
@endsection

@section('content')
    @if ($news)
        <h2>{{ $news->title }}</h2>
        <img src="{{ $news->picture ?? asset('storage/news.jpg') }}" alt="">
        <p>{{ $news->short }}</p>
        <p>{!! $news->description !!}</p>
        @if ($news->link)
            <a href="{{ $news->link }}">Просмотреть</a>
        @endif
    @else
        <p>Новость не существует</p>
    @endif
@endsection
