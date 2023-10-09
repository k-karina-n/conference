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

    public User $user;

    public function mount(int $id)
    {
        $this->user = User::findOrFail($id);

        $this->form->setUserData($this->user);
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
