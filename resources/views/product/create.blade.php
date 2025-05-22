@extends('layouts.app')

@section('title', 'Создание товара')

@section('content')
    <h1>Создание товара</h1>
    <form class="w-50" method="POST" action="{{ route('products.store') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Название</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('name')
            <div id="emailHelp" class="form-text text-danger text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Описание</label>
            <textarea name="description" type="text" class="form-control" id="exampleInputPassword1"></textarea>
            @error('description')
            <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="exampleCheck1">Цена</label>
            <input name="price" type="text" class="form-control" id="exampleCheck1" placeholder="0.00">
            @error('price')
            <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="exampleCheck1">Категория</label>
            <select name="category_id" class="form-control">
                {{ $categories }}
                @forelse($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @empty
                    <option>Категорий нет</option>
                @endforelse
            </select>
            @error('category_id')
            <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection
