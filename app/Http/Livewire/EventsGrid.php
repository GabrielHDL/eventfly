<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class EventsGrid extends Component
{
    use WithPagination;

    public function render()
    {
        $events = Event::paginate(8);

        return view('livewire.events-grid', compact('events'));
    }
}
