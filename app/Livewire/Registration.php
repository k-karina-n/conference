<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\RegistrationForm;

class Registration extends Component
{
    use WithFileUploads;

    public RegistrationForm $form;

    public function save()
    {
        $this->form->store();

        return redirect()->to('/registration-form');
    }

    public function render()
    {
        return view('livewire.registration')
            ->layout('components.layouts.registration');
    }
}
