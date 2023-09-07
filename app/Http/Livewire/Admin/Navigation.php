<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {

        $navigation = [
            [
                'title' => 'Dashboard',
                'url' => route('admin.home'),
                'active' => request()->routeIs('admin.home')
            ],
            [
                'title' => 'Home',
                'url' => route('home'),
                'active' => request()->routeIs('home')
            ],
        ];

        return view('livewire.admin.navigation', compact('navigation'));
    }
}
