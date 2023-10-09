<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\View\View;
use App\Models\User;

class ShowList extends Component
{
    /**
     * Trait for handling pagination.
     */
    use WithPagination;

    /**
     * Render the view with a list of speakers.
     * 
     * @return View
     */
    public function render(): View
    {
        return view('livewire.show-list', [
            'users' => User::paginate(10),
        ]);
    }

    /**
     * Redirect admin to the form to create new speaker.
     * 
     * @return void
     */
    public function createUser(): void
    {
        $this->redirect("/list/create-user");
    }

    /**
     * Redirect admin to the form to update a speaker.
     * 
     * @param int $id The ID of a user to update.
     * @return void
     */
    public function updateUser(int $id): void
    {
        $this->redirect("/list/edit-user/{$id}");
    }

    /**
     * Delete the specified user and flash a success message to the session.
     *
     * @param int $id The ID of a user to delete.
     * @return mixed
     */
    public function deleteUser(int $id): mixed
    {
        User::destroy($id);

        return session()->flash('status', 'Speaker has been deleted.');
    }
}
