<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class AdminAuthForm extends Form
{
    #[Rule('required|email|exists:admins,email', attribute: 'email')]
    public string $email;

    #[Rule('required', attribute: 'password')]
    public string $password;
}
