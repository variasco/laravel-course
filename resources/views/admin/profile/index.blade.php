@extends('layouts.app')

@section('title', 'Профили')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <h2>Редактирование пользователей</h2>

    <a href="{{ route('admin.user.create') }}" class="btn btn-success mb-3">Создать пользователя</a>
    <h3>Все пользователи:</h3>
    @forelse ($users as $item)
        @if ($item->email == auth()->user()->email)
            @continue
        @endif
        <h4>Имя: {{ $item->name }}, почта: {{ $item->email }}</h4>
        <form method="post" action="{{ route('admin.user.destroy', $item) }}">
            @csrf
            @method('DELETE')
            <a href="{{ route('admin.user.edit', $item) }}" class="btn btn-success">Редактировать</a>
            <button class="btn btn-danger" type="submit">Удалить</button>
        </form>
        <form method="post" action="{{ route('admin.user.toggle', $item) }}">
            @csrf
            @method('PATCH')
            <button class="btn mb-3 btn{{ !$item->admin ? '-outline' : '' }}-primary" type="submit">Админ</button>
        </form>
    @empty
        <h3>Нет пользователей</h3>
    @endforelse
    {{ $users->links() }}
@endsection
