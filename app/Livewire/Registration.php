<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\RegistrationForm;
use App\Models\User;

class Registration extends Component
{
    use WithFileUploads;

    public RegistrationForm $form;

    public function save()
    {
        User::create($this->form->validate());
        
        return view('livewire.congratulation')
            ->layout('components.layouts.registration');
    }

    public function render()
    {
        return view('livewire.registration')
            ->layout('components.layouts.registration');
    }
}
