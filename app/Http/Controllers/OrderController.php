<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Http\Requests\OrserStoreRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $orders = Order::all();
        return view('order.index', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OrserStoreRequest $request)
    {
        $validate = $request->validated();
        $product = Product::findOrFail($validate['product_id']);
        $validate['total_price'] = $validate['count'] * $product->price;
        $order = Order::create($validate);
        return redirect()->route('products.index')->with('status', 'Заказ №' . $order->id . ' оформлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('order.show', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $order = Order::findOrFail($id);
        $order->status = OrderStatus::COMPLETED;
        $order->save();
        return redirect()->route('orders.show', ['order' => $order->id])->with('status', 'Статус заказа № ' . $order->id . ' изменен!');
    }
}
