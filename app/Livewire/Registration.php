<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;

class Registration extends Component
{
    use WithFileUploads;

    public $firstName;
    public $lastName;
    public $phone;
    public $email;
    public $country;
    public $photo;
    public $title;
    public $description;
    public $date;

    public function save()
    {
        User::create(
            $this->only(['first_name', 'last_name', 'phone', 'email', 'country', 'photo', 'title', 'description', 'date'])
        );

        return view('livewire.congratulation')
            ->layout('components.layouts.registration');
    }

    public function render()
    {
        return view('livewire.registration')
            ->layout('components.layouts.registration');
    }
}
