<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use App\Models\User;
use Livewire\Form;

class RegistrationForm extends Form
{
    #[Rule('required|string|max:255')]
    public $firstName;

    #[Rule('required|string|max:255')]
    public $lastName;

    #[Rule('required|max:18')]
    public $phone;

    #[Rule('required|email|unique:users,email')]
    public $email;

    #[Rule('required')]
    public $country;

    #[Rule('required')]
    public $photo;

    #[Rule('required')]
    public $title;

    #[Rule('required|max:1000')]
    public $description;

    #[Rule('required|after_or_equal:today')]
    public $date;

    public function store()
    {
        User::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'phone' => $this->phone,
            'email' => $this->email,
            'country' => $this->country,
            'photo' => $this->photo,
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date
        ]);
    }
}
