<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class EventsGrid extends Component
{
    use WithPagination;

    public $categorySlug = 'all';

    public function updatedCategorySlug(){
        $this->resetPage();
    }

    public function render()
    {   
        $categories = Category::all();

        
        foreach ($categories as $item) {
            $eventsQuery = Event::query()->whereHas('subcategory.category', function(Builder $query){
                $query->where('slug', $this->categorySlug)->where('status', Event::PUBLISHED);
            });
        }

        if ($this->categorySlug === 'all') {
            $events = Event::where('status', Event::PUBLISHED)->orderBy('id', 'desc')->paginate(12);
        }else {
            $events = $eventsQuery->orderBy('id', 'desc')->paginate(12);
        }
        // $events = Event::paginate(12);

        return view('livewire.events-grid', compact('events', 'categories'));
    }
}
