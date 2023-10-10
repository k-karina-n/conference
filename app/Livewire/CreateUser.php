<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\UserDataForm;
use App\Models\User;
use Illuminate\View\View;

class CreateUser extends Component
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
     * Render the component view.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.user-form');
    }

    /**
     * Save the new user data and report the result to the admin.
     *
     * @return void
     */
    public function save(): void
    {
        $this->validated();

        if (User::create($this->form->all())) {
            $this->form->storePhoto();
            $this->redirect('/list');
            $this->clearSessionData();
            session()->now('status', 'Speaker has been added.');
        }

        $this->addError('save', 'Failed to add speaker');
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

    /**
     * Call method from UserDataForm to get user data from session.
     * 
     * @return void
     */
    public function getSessionData(): void
    {
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

    /**
     * Call method from UserDataForm to clear session data.
     * 
     * @return void
     */
    public function clearSessionData(): void
    {
        $this->form->clearSessionData();
    }}
