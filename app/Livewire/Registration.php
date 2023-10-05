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
    /**
     * Trait for handling file uploads in the component.
     */
    use WithFileUploads;

    /**
     * The form for the first step of the registration process.
     *
     * @var FirstStepForm The form object.
     */
    public FirstStepForm $firstStep;

    /**
     * The form for the second step of the registration process.
     *
     * @var SecondStepForm The form object.
     */
    public SecondStepForm $secondStep;

    /**
     * Whether the first step of the registration process is visible.
     *
     * @var bool The visibility flag.
     */
    public $firstStepVisible = true;

    /**
     * Whether the registration process was successful.
     *
     * @var bool The success flag.
     */
    public $registrationSuccess = false;

    /**
     * The message to display to the user.
     *
     * @var string The message string.
     */
    public string $message;

    /**
     * Return the view for the main page with registration form. 
     * 
     * @return View
     */
    public function render(): View
    {
        return view('livewire.registration')
            ->layout('components.layouts.registration');
    }

    /**
     * Validate data from the first step of registration form.
     * 
     * @return bool Set visibility of first step of registration form to false.
     */
    public function validateFirstStep(): bool
    {
        $this->firstStep->validate();

        return $this->firstStepVisible = false;
    }

    /**
     * Validate data from the second step of registration form.
     * 
     * @return void Call a method to save validated data from a registration from.
     */
    public function validateSecondStep(): void
    {
        $this->secondStep->validate();

        $this->save();
    }

    /**
     * Store the user's data in the database and mark the registration process as successful.
     * 
     * @return bool Whether the registration process was successful.
     */
    public function save(): bool
    {
        User::create(array_merge(
            $this->firstStep->all(),
            $this->secondStep->all()
        ));

        $this->setMessage();

        return $this->registrationSuccess = true;
    }

    /**
     * Create the message for social media including the provided conference title by a user.
     * 
     * @return string The message for social media.
     */
    public function setMessage(): string
    {
        $title = $this->secondStep->title;

        return $this->message = "Hey, I'm speaking on $title! To know more about it, visit conference.com";
    }
}
