<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UpdateUser extends Component
{
    public $user;

    public function mount(int $id)
    {
        $this->user = User::findOrFail($id);
    }

    public function save()
    {
        $this->user->update();
    }

    public function render()
    {
        return view('livewire.update-user-form', [
            'user' => $this->user
        ]);
    }
}
