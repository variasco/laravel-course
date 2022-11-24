@extends('layouts.app')

@section('title', $news->title ?? 'Новость не существует')

@section('menu')
    @include('menu')
@endsection

@section('content')
    @if ($news)
        <h2>{{ $news->title }}</h2>
        <p>{{ $news->short }}</p>
        <p>{{ $news->description }}</p>
    @else
        <p>Новость не существует</p>
    @endif
@endsection
