<?php

use App\Models\Event;
use Gloudemans\Shoppingcart\Facades\Cart;

function quantity($event_id){
    $event = Event::find($event_id);

    $quantity = $event->quantity;

    return $quantity;
}

function qty_added($event_id){
    $cart = Cart::content();

    $item = $cart->where('id', $event_id)->first();

    if($item){
        return $item->qty;
    }else{
        return 0;
    }
}

function qty_available($event_id){
    return quantity($event_id) - qty_added($event_id);
}


function discount($item){
    $event = Event::find($item->id);
    $qty_available = qty_available($item->id);

    $event->quantity = $qty_available;
    $event->save();
}

function increase($item){
    $event = Event::find($item->id);
    
    $quantity = quantity($item->id) + $item->qty;

    $event->quantity = $quantity;
    $event->save();
}