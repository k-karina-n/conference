<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class SecondStepForm extends Form
{
    #[Rule('required', attribute: 'title')]
    public $title;

    #[Rule('required|max:1000', attribute: 'description')]
    public $description;

    #[Rule('required|after_or_equal:today', attribute: 'date')]
    public $date;
}
