<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddCartItem extends Component
{
    public $event;

    public $qty = 1;

    public $options = [];
    

    public function mount(){
        $this->options['image'] = Storage::url($this->event->images->first()->url);
    }

    public function addItem(){
        Cart::add([ 'id' => $this->event->id,
                    'name' => $this->event->name,
                    'price' => $this->event->price,
                    'qty' => $this->qty,
                    'weight' => 550,
                    'options' => $this->options
                ]);

        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
