<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\UserDataForm;
use App\Models\User;
use Livewire\Features\SupportRedirects\Redirector;
use Illuminate\View\View;

class UserRegistration extends Component
{
    /**
     * Trait for handling file uploads in the component.
     */
    use WithFileUploads;

    /**
     * The form to validate user data.
     *
     * @var UserDataForm The form object.
     */
    public UserDataForm $form;

    /**
     * Whether the first step of the registration process is visible.
     *
     * @var bool The visibility flag.
     */
    public $formUserDataVisible = true;

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
        return view('livewire.registration-form');
    }

    /**
     * Call method from UserDataForm to get user data from cookies.
     * 
     * @return void
     */
    public function getCookie(): void
    {
        $this->form->getCookie();
    }

    /**
     * Call method from UserDataForm to save user data to cookies.
     * 
     * @param string $name Input name
     * @return void
     */
    public function updateCookie(string $name): void
    {
        $this->form->updateCookie($name);
    }

    /**
     * Validate data from the first step of registration form.
     * 
     * @return bool Set visibility of first step of registration form to false.
     */
    public function validateUserData(): bool
    {
        $this->form->setPersonalDataRules()->validate();

        return $this->formUserDataVisible = false;
    }

    /**
     * Validate data from the second step of registration form.
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
     * Redirect user to the page with a list of speakers.
     * 
     * @return Redirector
     */
    public function showList(): Redirector
    {
        return redirect('/list');
    }
}
