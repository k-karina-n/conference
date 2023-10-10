<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\UserDataForm;
use Illuminate\View\View;
use App\Models\User;

class UpdateUser extends Component
{
    /**
     * Trait for handling file uploads in the component.
     */
    use WithFileUploads;

    /**
     * The form to validate user data.
     *
     * @var UserDataForm The form object.
     */
    public UserDataForm $form;

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
        $this->validated();

        if ($this->user->update($this->form->all())) {
            $this->redirect('/list');
            session()->flash('status', 'Speaker has been updated.');
        }

        return $this->addError('save', 'Failed to update a speaker');
    }

    /**
     * Set validate rules for user form and validate data.
     *
     * @return array The validated user data.
     */
    public function validated(): array
    {
        return $this->form
            ->setPersonalDataRules()
            ->setConferenceDataRules()
            ->validate();
    }

    public function getSessionData(): void
    {
        $this->form->setUserData($this->user);
    }

    public function updateSessionData(string $name): void
    {
        $this->form->updateSessionData($name);
    }
}
