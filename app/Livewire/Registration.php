<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\FirstStepForm;
use App\Livewire\Forms\SecondStepForm;
use App\Models\User;

class Registration extends Component
{
    use WithFileUploads;

    public FirstStepForm $firstStep;

    public SecondStepForm $secondStep;

    public $firstStepVisible = true;

    public $registrationSuccess = false;

    public $message;

    public function save()
    {
        $this->secondStep->validate();

        User::create(array_merge(
            $this->firstStep->all(),
            $this->secondStep->all()
        ));

        $this->getMessage();
        $this->registrationSuccess = true;
    }

    public function validateFirstStep()
    {
        $this->firstStep->validate();

        $this->firstStepVisible = false;
    }

    public function getMessage()
    {
        $title = $this->secondStep->title;

        $this->message = "Hey, I'm speaking on $title! To know more about it, visit conference.com";
    }

    public function render()
    {
        return view('livewire.registration')
            ->layout('components.layouts.registration');
    }
}
