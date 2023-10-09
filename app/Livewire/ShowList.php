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

    public function addUser()
    {
    }

    public function editUser(int $id)
    {
        $this->redirect("/list/edit-user/{$id}");
    }

    public function deleteUser(int $id)
    {
        User::destroy($id);

        return session()->flash('status', 'Speaker has been deleted.');
    }
}
