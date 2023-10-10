<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class AdminAuthForm extends Form
{
    /**
     * Admin email to be validated.
     *
     * @var string
     */
    #[Rule('required|email|exists:admins,email', attribute: 'email')]
    public string $email;

    /**
     * Admin password to be validated.
     *
     * @var string
     */
    #[Rule('required', attribute: 'password')]
    public string $password;
}
