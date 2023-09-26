<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function show(Ticket $ticket) {

        // $this->authorize('ticket', $ticket);
        $ticket = Ticket::where('id', $ticket->id)->where('user_id', auth()->user()->id)->first();

        return view('tickets.show', compact('ticket'));
    }
}
