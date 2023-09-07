<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        $navigation = [
            [
              'title' => 'Home',
              'url' => route('home'),
              'active' => request()->routeIs('home')
            ],
        ];

        return view('livewire.navigation', compact('navigation'));
    }
}
