<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShoppingCart extends Component
{
    protected $listeners = ['render'];

    // public function destroy(){
    //     Cart::destroy();

    //     $this->emitTo('dropdown-cart', 'render');
    // }

    public function delete($rowID){
        Cart::remove($rowID);
        // $this->emitTo('dropdown-cart', 'render');
    }

    public function createOrder() {
        $order = new Order(); //Esta preparando el componente para crear una nueva Orden en el modelo Order.

        $order->user_id = auth()->user()->id; //Inidicando que en el campo "user_id" de Order vaya el id del usuario que la esta creando.
        $order->total = Cart::subtotal(); //En el campo "total" de Order esta mandando la información del subtotal del Carrito de compras.
        $order->content = Cart::content();//Esta guardando en el campo "content" de Order el contanido del carrito (JSON File)

        $order->save(); //Order guarda la información.

        Cart::destroy(); //Carrito destruye tu contenido.

        return redirect()->route('orders.payment', $order); //redirigeme a la ruta "orders.payment.
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
