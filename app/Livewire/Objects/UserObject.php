<?php

namespace App\Livewire\Objects;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\UserDataForm;

abstract class UserObject extends Component
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
    }
}
