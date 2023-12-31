<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function author(User $user, Order $order){
        if ($order->user_id == $user->id) {
            return true;
        }else{
            return false;
        }
    }

    // public function ticket(User $user, Ticket $ticket){
    //     if ($ticket->user_id == $user->id) {
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

    public function payment(User $user, Order $order){
        if ($order->status == 1) {
            return true;
        }else{
            return false;
        }
    }
}
