@extends('layouts.app')
@section('title', !$user->id ? 'Создание пользователя' : 'Редактирование пользователя')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="col-md-6 left">
        <div class="card-header">
            <h2>{{ !$user->id ? 'Создать нового пользователя' : 'Изменить пользователя' }}</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ !$user->id ? route('admin.user.store') : route('admin.user.update', $user) }}">
                @csrf
                @if ($user->id)
                    @method('PUT')
                @endif
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ $user->name ?? old('name') }}" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $user->email ?? old('email') }}">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="form-label">{{ $user->id ? 'Новый пароль' : 'Пароль' }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password-confirm" class="form-label">Подтвердить пароль</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" {{ $user->admin == 1 || old('admin') == '1' ? 'checked' : '' }}
                        type="checkbox" id="admin" name="admin" value="1">
                    <label class="form-label" for="admin">Админ</label>
                </div>

                <div class="form-group mb-3">
                    <button class="btn btn-primary mb-3" type="submit">{{ !$user->id ? 'Создать' : 'Изменить' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
