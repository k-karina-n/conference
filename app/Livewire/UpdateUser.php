<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\UserDataForm;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Route;

class UpdateUser extends Component
{
    /**
     * Trait for handling file uploads in the component.
     */
    use WithFileUploads;

    /**
     * Contain specific user data.
     * 
     * @var User $user User object.
     */
    public User $user;

    /**
     * The form to validate user data.
     *
     * @var UserDataForm The form object.
     */
    public UserDataForm $form;

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

    /**
     * Call method from UserDataForm to get user data from session.
     * 
     * @return mixed
     */
    public function getSessionData(): mixed
    {
        if (Route::currentRouteName('edit-user')) {
            return $this;
        }

        $this->form->getSessionData();
    }

    /**
     * Call method from UserDataForm to save user data to session.
     * 
     * @param string $name Input name
     * @return void
     */
    public function updateSessionData(string $name): void
    {
        $this->form->updateSessionData($name);
    }

    public function clearSessionData(): void
    {
        $this->form->clearSessionData();
    }
}
