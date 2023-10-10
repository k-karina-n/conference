<?php

namespace App\Livewire;

use App\Livewire\Objects\UserObject;
use App\Models\User;
use Livewire\Features\SupportRedirects\Redirector;
use Illuminate\View\View;

class UserRegistration extends UserObject
{
    /**
     * Whether the first step of the registration process is visible.
     *
     * @var bool The visibility flag.
     */
    public bool $formUserDataVisible;

    /**
     * Whether the registration process was successful.
     *
     * @var bool The success flag.
     */
    public bool $registrationSuccess = false;

    /**
     * The message to display to the user.
     *
     * @var string The message string.
     */
    public string $message;

    /**
     * Set visibility flag to a component property.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->formUserDataVisible = session()->get('formUserDataVisible') ?? true;
    }

    /**
     * Return the view for the main page with registration form. 
     * 
     * @return View
     */
    public function render(): View
    {
        return view('livewire.registration-form');
    }

    /**
     * Validate user data from the registration form.
     * 
     * @return void Set visibility of first step of registration form to false and save it to session.
     */
    public function validateUserData(): void
    {
        $this->form->setPersonalDataRules()->validate();

        session()->put('formUserDataVisible', $this->formUserDataVisible = false);
    }

    /**
     * Validate conference data from the registration form.
     * 
     * @return void Call a method to save validated data from a registration from.
     */
    public function validateConferenceData(): void
    {
        $this->form->setConferenceDataRules()->validate();

        $this->save();
    }

    /**
     * Store the user's data in the database and mark the registration process as successful.
     * 
     * @return bool Whether the registration process was successful.
     */
    public function save(): bool
    {
        $this->form->storePhoto();

        User::create($this->form->all());

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
        $title = $this->form->title;

        return $this->message = "Hey, I'm speaking on $title! To know more about it, visit conference.com";
    }

    /**
     * Redirect user to the page with a list of speakers and clear session data after registration.
     * 
     * @return Redirector
     */
    public function showList(): Redirector
    {
        $this->form->clearSessionData();

        return redirect('/list');
    }
}
