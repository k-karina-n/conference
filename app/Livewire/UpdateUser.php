<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\UserDataForm;
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

    public function mount(int $id)
    {
        $user = User::findOrFail($id);

        $this->form->setUserData($user);
    }

    public function save()
    {
        $this->user->update($this->form->all());

        $this->redirect('/list');

        return session()->flash('status', 'Speaker has been updated.');
    }

    public function render()
    {
        return view('livewire.user-form');
    }
}
