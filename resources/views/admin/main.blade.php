@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <h2>Вы в зоне админа</h2>
@endsection
