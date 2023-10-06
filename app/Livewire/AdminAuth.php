<?php

namespace App\Livewire;

use Livewire\Component;

class AdminAuth extends Component
{
    public $login = true;

    public function render()
    {
        return view('livewire.admin-auth');
    }
}
