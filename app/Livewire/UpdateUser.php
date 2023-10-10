<?php

namespace App\Livewire;

use App\Livewire\Objects\UserObject;
use Illuminate\View\View;
use App\Models\User;

class UpdateUser extends UserObject
{
    /**
     * Contain specific user data.
     * 
     * @var User $user User object.
     */
    public User $user;

    /**
     * Find a user with a give ID and sets user data for the form.
     * 
     * @param int $id The ID of the user to find.
     * @return void
     */
    public function mount(int $id): void
    {
        $this->user = User::findOrFail($id);

        $this->form->setUserData($this->user);
    }

    /**
     * Render the view with a form for updating speaker data.
     * 
     * @return View
     */
    public function render(): View
    {
        return view('livewire.user-form');
    }

    /**
     * Update user data in a database and report the result to the admin.
     * 
     * @return mixed
     */
    public function save(): mixed
    {
        if ($this->user->update($this->form->all())) {
            $this->redirect('/list');
            session()->now('status', 'Speaker has been updated.');
            $this->clearSessionData();
        }

        return $this->addError('save', 'Failed to update a speaker');
    }
}
