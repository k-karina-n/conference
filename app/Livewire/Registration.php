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

    public function save()
    {
        $this->secondStep->validate();

        User::create(array_merge(
            $this->firstStep->all(),
            $this->secondStep->all()
        ));

        return redirect()->to('/registration-form');
    }

    public function validateFirstStep()
    {
        $this->firstStep->validate();

        $this->firstStepVisible = false;
    }

    public function render()
    {
        return view('livewire.registration')
            ->layout('components.layouts.registration');
    }
}
