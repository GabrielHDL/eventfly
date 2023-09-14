<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CreateOrder extends Component
{
    public function create_order(){

        $order = new Order();

        $order->user_id = auth()->user()->id;
        $order->total = Cart::subtotal();
        $order->content = Cart::content();

        $order->save();

        Cart::destroy();

        return redirect()->route('orders.payment', $order);
    }

    public function render()
    {
        return view('livewire.create-order');
    }
}
