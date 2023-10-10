<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class AdminAuthForm extends Form
{
    /**
     * Admin email to be validated.
     *
     * @var mixed
     */
    #[Rule('required|email|exists:admins,email', attribute: 'email')]
    public $email;

    /**
     * Admin password to be validated.
     *
     * @var mixed
     */
    #[Rule('required', attribute: 'password')]
    public $password;
}
