<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index() {
        return view('events.index');
    }

    public function show(Event $event) {
        return view('events.show', compact('event'));
    }
}
