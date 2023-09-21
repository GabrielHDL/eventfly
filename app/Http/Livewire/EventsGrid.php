<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class EventsGrid extends Component
{
    use WithPagination;

    public $categorySlug = 'all';

    public $categories;

    public function mount() {
        $this->categories = Category::inRandomOrder()->limit(3)->get(); // arreglo
    }

    public function updatedCategorySlug(){
        $this->resetPage();
    }

    public function render()
    {

        $eventsQuery = Event::query()->whereHas('subcategory.category', function(Builder $query){
            $query->where('slug', $this->categorySlug)->where('status', Event::PUBLISHED);
        });

        if ($this->categorySlug === 'all') {
            $events = Event::where('status', Event::PUBLISHED)->orderBy('id', 'desc')->paginate(12);
        }elseif($this->categorySlug === 'hoy') {
            $events = Event::where('date', Carbon::now()->format('d-m-Y'))->orderBy('id', 'desc')->paginate(12);
        }else {
            $events = $eventsQuery->orderBy('id', 'desc')->paginate(12);
        }

        $categories = $this->categories;

        // $events = Event::paginate(12);

        return view('livewire.events-grid', compact('events', 'categories'));
    }
}
