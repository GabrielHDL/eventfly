<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;

class CategoryFilter extends Component
{
    public $category;

    public function render()
    {
        $eventsQuery = Event::query()->whereHas('subcategory.category', function(Builder $query){
            $query->where('id', $this->category->id)->where('status', Event::PUBLISHED);
        });

        $events = $eventsQuery->orderBy('id', 'desc')->paginate(12);

        return view('livewire.category-filter', compact('events'));
    }
}
