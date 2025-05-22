@extends('layouts.app')

@section('title', 'Главная страница!')

@section('content')
    <h1>Главная страница!</h1>
    <p>Добро пожаловать на главную.</p>
    <a href="{{ route('products.index') }}">Все товары</a>
@endsection
