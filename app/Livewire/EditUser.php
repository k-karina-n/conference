<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class EditUser extends Component
{
    public $user;

    public function mount($id = 9)
    {
        $this->user = User::findOrFail($id);
    }

    public function save()
    {
        $this->user->update();
    }

    public function render()
    {
        return view('livewire.user-form', [
            'user' => $this->user
        ]);
    }
}
