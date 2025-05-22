@extends('layouts.app')

@section('title',  $product->name)

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <h2>{{ number_format($product->price, 2, '.', ' ') }} руб.</h2>
    <p>{{ $product->category->name }}</p>
    <p>{{ $product->created_at }}</p>
    <p>{{ $product->updated_at }}</p>
    @if ($product->trashed())
        <div class="alert alert-warning">
            Этот товар больше не продаётся.
        </div>
    @else
        <form class="w-50" method="POST" action="{{ route('orders.store') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ФИО покупателя</label>
                <input name="full_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('full_name')
                <div id="emailHelp" class="form-text text-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Комментарий к заказу</label>
                <textarea name="comment" class="form-control" id="exampleInputPassword1"></textarea>
                @error('comment')
                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleCheck1">Количество</label>
                <input name="count" type="number" class="form-control" id="exampleCheck1">
                @error('count')
                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <input name="product_id" value="{{ $product->id }}" type="hidden">
            <button type="submit" class="btn btn-primary">Заказать</button>
        </form>
    @endif
@endsection
