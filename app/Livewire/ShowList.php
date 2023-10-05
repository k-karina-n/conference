<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class ShowList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.show-list', [
            'users' => User::paginate(10),
        ]);
    }
}
