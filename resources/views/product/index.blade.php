@extends('layouts.app')

@section('title', 'Все товары')

@section('content')
    <x-alert/>
    <h1>Все товары</h1>
    <div class="row mt-3">
        @forelse($products as $product)
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ number_format($product->price, 2, '.', ' ') }} руб.</h6>
                        <div class="d-flex justify-content-between">
                            <strong>Категория:</strong>
                            <p class="card-text">{{ $product->category->name }}</p>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <a href="{{ route('products.show', ['product' => $product->id]) }}" class="card-link">Подробнее</a>
                            <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="card-link">Редактировать</a>
                        </div>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $product->id }}">удалить</button>
                        <x-modal id="{{ $product->id }}" content="Удалить товар {{ $product->name }}">
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Удалить</button>
                            </form>
                        </x-modal>
                    </div>
                </div>
            </div>
        @empty
            <p>Товаров нет</p>
        @endforelse
    </div>

@endsection
