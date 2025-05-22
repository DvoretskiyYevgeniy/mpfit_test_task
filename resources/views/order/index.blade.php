@extends('layouts.app')

@section('title', 'Все заказы')

@section('content')
    <x-alert/>
    <h1>Все заказы</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">№ заказа</th>
            <th scope="col">Дата создания</th>
            <th scope="col">ФИО покупателя</th>
            <th scope="col">Количество</th>
            <th scope="col">Сумма заказа</th>
            <th scope="col">Статуса заказа</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @forelse($orders as $order)
            <tr>
                <th scope="row">{{ $order->id }}</th>
                <td>{{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('d F Y H:i') }}</td>
                <td>{{ $order->full_name }}</td>
                <td>{{ $order->count }} шт.</td>
                <td>{{ number_format($order->total_price, 2, '.', ' ') }} руб.</td>
                <td @if($order->status == \App\Enums\OrderStatus::COMPLETED->value) class="text-success" @endif>{{ $order->status }}</td>
                <td>
                    <a class="ms-2" href="{{ route('orders.show', ['order' => $order->id]) }}">Подробнее</a>
                </td>
            </tr>
        @empty
            <tr>
                <th scope="row">Заказов пока нет</th>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
