<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddCartItem extends Component
{
    public $event, $quantity;

    public $qty = 1;

    public $paymentMethodId;

    public $options = [];
    
    public function getDefaultPaymentMethodProperty() {
        return auth()->user()->defaultPaymentMethod();
    }

    public function mount(){
        $this->quantity = qty_available($this->event->id);
        $this->options['image'] = Storage::url($this->event->images->first()->url);
        if (auth()->user()) {
            if (auth()->user()->hasDefaultPaymentMethod()) {
                $this->paymentMethodId = $this->defaultPaymentMethod->id;
            }
        }
    }

    public function decrement(){
        $this->qty = $this->qty - 1;
    }

    public function increment(){
        $this->qty = $this->qty + 1;
    }

    public function addItem(){
        Cart::add([ 'id' => $this->event->id,
                    'name' => $this->event->name,
                    'price' => $this->event->price,
                    'qty' => $this->qty,
                    'weight' => 550,
                    'options' => $this->options
                ]);

        $this->quantity = qty_available($this->event->id);

        $this->reset('qty');

        $this->emitTo('dropdown-cart', 'render');
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

        $this->quantity = qty_available($this->event->id);

        $this->reset('qty');

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->total = Cart::subtotal();
        $order->content = Cart::content();

        $order->save();

        foreach (Cart::content() as $item) {
            discount($item);
        }

        Cart::destroy();

        $this->emitTo('dropdown-cart', 'render');

        return redirect()->route('orders.payment', $order);
    }

    public function oneClickPay(){
        
        if (Cart::count()) {
            Cart::destroy();
        }

        Cart::add([
                    'id' => $this->event->id,
                    'name' => $this->event->name,
                    'price' => $this->event->price,
                    'qty' => $this->qty,
                    'weight' => 550,
                    'options' => $this->options
                ]);

        $this->quantity = qty_available($this->event->id);

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->total = Cart::subtotal();
        $order->content = Cart::content();

        foreach (Cart::content() as $item) {
            discount($item);
        }

        $this->emitTo('dropdown-cart', 'render');

        try {
            auth()->user()->charge($order->total * 100, $this->paymentMethodId);
            $order->status = Order::PAID;
            $order->save();

            $this->event->attendees = $this->event->attendees + $this->qty;

            $this->event->save();

            foreach (range(1, Cart::count()) as $item) {
                Ticket::create([
                    'user_id' => auth()->user()->id,
                    'order_id' => $order->id,
                    'event_name' => $this->event->name,
                    'event_date' => $this->event->date,
                    'event_description' => $this->event->description,
                    'event_price' => $this->event->price,
                ]);
            }

            Cart::destroy();

            $this->reset('qty');

            // $this->sendConfirmationMail($this->order);

            // $this->sendNotificationMail($this->order);

            return redirect()->route('orders.show', $order);

        } catch (\Exception $e) {
            $this->addError('paymentMethodId', $e->getMessage());

            return;
        }
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
