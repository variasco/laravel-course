@extends('layouts.app')

@section('title', 'Категории')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <h2>Категории</h2>
    @forelse ($categories as $item)
        <a href="{{ route('news.category', $item->slug) }}">{{ $item->name }}</a><br>
    @empty
        <p>Категории отсутствуют</p>
    @endforelse
@endsection
