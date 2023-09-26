<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::query()->where('user_id', auth()->user()->id);

        if (request('status')) {
            $orders->where('status', request('status'));
        }

        $orders = $orders->get();


        $pending = Order::where('status', Order::PENDING)->where('user_id', auth()->user()->id)->count();
        $paid = Order::where('status', Order::PAID)->where('user_id', auth()->user()->id)->count();
        $nulled = Order::where('status', Order::NULLED)->where('user_id', auth()->user()->id)->count();


        return view('orders.index', compact('orders', 'pending', 'paid', 'nulled'));
    }

    public function show(Order $order){

        $this->authorize('author', $order);

        $items = json_decode($order->content);

        $tickets = Ticket::where('user_id', auth()->user()->id)->where('order_id', $order->id)->get();

        return view('orders.show', compact('order', 'items', 'tickets'));
    }
}
