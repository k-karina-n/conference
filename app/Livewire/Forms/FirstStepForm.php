<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class FirstStepForm extends Form
{
    #[Rule('required|string|max:255')]
    public $first_name;

    #[Rule('required|string|max:255')]
    public $last_name;

    #[Rule('required|max:18')]
    public $phone;

    #[Rule('required|email|unique:users,email')]
    public $email;

    #[Rule('required')]
    public $country;

    #[Rule('required')]
    public $photo;
}
