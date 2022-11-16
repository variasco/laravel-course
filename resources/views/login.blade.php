@extends('layout.main')

@section('title', 'Вход')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <h2>Вход</h2>
    <form method="POST" action="/login">
        <label for="login">
            <input type="text" name="login" placeholder="Логин">
        </label>
        <label for="pass">
            <input type="password" name="pass" placeholder="Пароль">
        </label>
        <label for="remember">
            <input type="checkbox" name="remember">
            Запомнить меня
        </label>
        <button type="submit">Войти</button>
    </form>
@endsection
