@extends('layouts.app')

@section('title', 'Новости')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <h2>Редактирование новостей</h2>
    @forelse ($news as $item)
        <h4><a href="{{ route('news.show', $item) }}">{{ $item->title }}</a></h4>
        <form method="post" action="{{ route('admin.news.destroy', $item) }}">
            @csrf
            @method('DELETE')
            <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-success">Редактировать</a>
            <button class="btn btn-danger" type="submit">Удалить</button>
        </form>
        <br>
    @empty
        <h3>Нет новостей</h3>
    @endforelse
    {{ $news->links() }}
@endsection
