<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class FirstStepForm extends Form
{
    #[Rule('required|string|max:20', attribute: 'First Name')]
    public $first_name;

    #[Rule('required|string|max:20', attribute: 'Second Name')]
    public $last_name;

    #[Rule('required|max:18', attribute: 'Phone')]
    public $phone;

    #[Rule('required|email|unique:users,email', attribute: 'Email')]
    public $email;

    #[Rule('required', attribute: 'Country')]
    public $country;

    #[Rule('required', attribute: 'Photo')]
    public $photo;
}
