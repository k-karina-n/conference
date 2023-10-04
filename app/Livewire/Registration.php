<?php

namespace App\Livewire;

use Livewire\Component;

class Registration extends Component
{
    public function render()
    {
        return view('livewire.registration')
            ->layout('components.layouts.registration');
    }
}