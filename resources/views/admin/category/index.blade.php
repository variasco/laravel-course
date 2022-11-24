@extends('layouts.app')

@section('title', 'Категории')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <h2>Редактирование категорий</h2>
    @forelse ($categories as $item)
        <h4>{{ $item->name }}</h4>
        <form method="post" action="{{ route('admin.category.destroy', $item) }}">
            @csrf
            @method('DELETE')
            <a href="{{ route('admin.category.edit', $item) }}" class="btn btn-success">Редактировать</a>
            <button class="btn btn-danger" type="submit">Удалить</button>
        </form>
        <br>
    @empty
        <h3>Нет категорий</h3>
    @endforelse
    {{ $categories->links() }}
@endsection
