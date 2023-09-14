<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class BuyNow extends Component
{
    public $event;

    public $qty = 1;

    public $options = [];

    public function mount(){
        $this->options['image'] = Storage::url($this->event->images->first()->url);
    }

    public function buyNow(){
        
        if (Cart::count()) {
            Cart::destroy();
        }

        Cart::add([
                    'id' => $this->event->id,
                    'name' => $this->event->name,
                    'price' => $this->event->price,
                    'qty' => $this->qty,
                    'weight' => 550, // un dato que debe estar ahi pero no sirve para nada.
                    'options' => $this->options
                ]);

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->total = Cart::subtotal();
        $order->content = Cart::content();

        $order->save();

        Cart::destroy();

        return redirect()->route('orders.payment', $order);

        // $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        return view('livewire.buy-now');
    }
}
