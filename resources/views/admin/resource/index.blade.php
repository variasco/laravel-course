@extends('layouts.app')

@section('title', 'Источники')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="card-header">
        <h2>Добавить источник новостей</h2>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.resource.store') }}">
            @csrf
            <div class="form-group mb-3">
                <label class="form-label" for="name">Название</label>
                <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text"
                    name="name" id="name">
                @error('name')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="form-label" for="source">Ссылка</label>
                <input class="form-control @error('source') is-invalid @enderror" value="{{ old('source') }}" type="text"
                    name="source" id="source">
                @error('source')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <button class="btn btn-primary mb-3" type="submit">Добавить</button>
            </div>
        </form>
    </div>
    <h2>Источники новостей</h2>
    @forelse ($resources as $item)
        <h4>{{ $item->name }}</h4>
        <p>{{ $item->source }}</p>
        <form method="post" action="{{ route('admin.resource.destroy', $item) }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Удалить</button>
        </form>
        <br>
    @empty
        <h3>Нет источников</h3>
    @endforelse
    {{ $resources->links() }}
@endsection
