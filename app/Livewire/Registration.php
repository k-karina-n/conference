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

        User::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'phone' => $this->phone,
            'email' => $this->email,
            'country' => $this->country,
            'photo' => $this->photo,
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date
        ]);

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
