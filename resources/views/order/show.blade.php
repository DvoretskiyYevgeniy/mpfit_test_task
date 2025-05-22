@extends('layouts.app')

@section('title', 'Заказ №'. $order->id)

@section('content')
    <x-alert/>
    <h1>Заказ № {{ $order->id }}</h1>
    <ul class="list-group w-50">
        <li class="list-group-item d-flex justify-content-between">
            <div>ФИО покупателя</div>
            <div class="fw-bold">{{ $order->full_name }}</div>
        </li>
        <li class="list-group-item d-flex justify-content-between">
            <div>Статус заказа</div>
            <div class="d-flex align-items-center">
                <span class="fw-bold @if($order->status == \App\Enums\OrderStatus::COMPLETED->value) text-success @endif me-2">{{ $order->status }}</span>
                @if($order->status != \App\Enums\OrderStatus::COMPLETED->value)
                    <form action="{{ route('orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary btn-sm">Сменить статус</button>
                    </form>
                @endif
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between">
            <div>Комментарий</div>
            <div class="fw-bold">{{ $order->comment }}</div>
        </li>
        <li class="list-group-item d-flex justify-content-between">
            <div>Количество</div>
            <div class="fw-bold">{{ $order->count }} шт.</div>
        </li>
        <li class="list-group-item d-flex justify-content-between">
            <div>Сумма</div>
            <div class="fw-bold">{{ number_format($order->total_price, 2, '.', ' ') }} руб.</div>
        </li>
        <li class="list-group-item d-flex justify-content-between">
            <div>Дата создания</div>
            <div class="fw-bold">{{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('d F Y H:i') }} {{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</div>
        </li>
        <li class="list-group-item d-flex justify-content-between">
            <div>Состав заказа</div>
            <div class="fw-bold">
                {{ $order->product->name }}
                <a href="{{ route('products.show', ['product' => $order->product->id]) }}">Подробнее</a>
            </div>
        </li>
    </ul>
@endsection
