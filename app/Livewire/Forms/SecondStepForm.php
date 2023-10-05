<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class SecondStepForm extends Form
{
    #[Rule('required')]
    public $title;

    #[Rule('required|max:1000')]
    public $description;

    #[Rule('required|after_or_equal:today')]
    public $date;
}
