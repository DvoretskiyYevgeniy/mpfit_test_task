@extends('layouts.app')

@section('title', 'Редактирование товара' . $product->name)

@section('content')
    <x-alert/>
    <h1>Редактирование товара "{{ $product->name }}"</h1>
    <form class="w-50" method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Название</label>
            <input value="{{ $product->name }}" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('name')
            <div id="emailHelp" class="form-text text-danger text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Описание</label>
            <textarea name="description" type="text" class="form-control" id="exampleInputPassword1">{{ $product->description }}</textarea>
            @error('description')
            <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="exampleCheck1">Цена</label>
            <input value="{{ $product->price }}" name="price" type="text" class="form-control" id="exampleCheck1" placeholder="0.00">
            @error('price')
            <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="exampleCheck1">Категория</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                            @if(isset($product->category) && $category->id == $product->category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
            <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
