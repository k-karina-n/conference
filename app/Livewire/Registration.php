<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\FirstStepForm;
use App\Livewire\Forms\SecondStepForm;
use App\Models\User;
use Illuminate\View\View;

class Registration extends Component
{
    use WithFileUploads;

    public FirstStepForm $firstStep;

    public SecondStepForm $secondStep;

    public $firstStepVisible = true;

    public $registrationSuccess = false;

    public $message;

    public function render(): View
    {
        return view('livewire.registration')
            ->layout('components.layouts.registration');
    }

    public function validateFirstStep(): bool
    {
        $this->firstStep->validate();

        return $this->firstStepVisible = false;
    }

    public function validateSecondStep(): bool
    {
        $this->secondStep->validate();

        return $this->save();
    }

    public function save(): bool
    {
        User::create(array_merge(
            $this->firstStep->all(),
            $this->secondStep->all()
        ));

        $this->getMessage();

        return $this->registrationSuccess = true;
    }

    public function getMessage(): string
    {
        $title = $this->secondStep->title;

        return $this->message = "Hey, I'm speaking on $title! To know more about it, visit conference.com";
    }
}
