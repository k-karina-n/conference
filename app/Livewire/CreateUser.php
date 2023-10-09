<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\UserDataForm;
use App\Models\User;

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

    public function save()
    {
        $this->form
            ->setPersonalDataRules()
            ->setConferenceDataRules()
            ->validate()
            ->storePhoto();

        User::create(
            $this->form->all()
        );

        $this->redirect('/list');

        return session()->flash('status', 'Speaker has been added.');
    }

    public function render()
    {
        return view('livewire.user-form');
    }
}
