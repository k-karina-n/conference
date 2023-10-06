<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class AdminAuthForm extends Form
{
    #[Rule('required|email|exists:admins,email', attribute: 'email')]
    public $email;

    #[Rule('required|', attribute: 'password')]
    public $password;
}
