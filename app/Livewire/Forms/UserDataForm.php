<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;

class UserDataForm extends Form
{
    /**
     * Validation rules for user data.
     *
     * @var array
     */
    public array $rules;

    /**
     * User personal data fields.
     *
     * @var string
     */
    public $first_name;
    public $last_name;
    public $phone;
    public $email;
    public $country;
    public $photo;

    /**
     * Conference data fields.
     *
     * @var string
     */
    public $title;
    public $description;
    public $date;

    /**
     * Set validation rules for personal data.
     *
     * @return UserDataForm $this
     */
    public function setPersonalDataRules(): UserDataForm
    {
        $this->rules = [
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'phone' => 'required|max:18',
            'email' => 'required|email|unique:users,email',
            'country' => 'required',
            'photo' => 'required',
        ];

        return $this;
    }

    /**
     * Set validation rules for conference data.
     *
     * @return UserDataForm $this 
     */
    public function setConferenceDataRules(): UserDataForm
    {
        $this->rules += [
            'title' => 'required',
            'description' => 'required|max:1000',
            'date' => 'required|after_or_equal:today'
        ];

        return $this;
    }

    /**
     * Store the uploaded photo.
     *
     * @return void
     */
    public function storePhoto(): void
    {
        $name = $this->photo->getClientOriginalName();

        $this->photo->storeAs('photos', $name, 'public');

        $this->photo = $name;
    }

     /**
     * Set user data to the form from a User object.
     *
     * @param User $user
     * @return void
     */
    public function setUserData(User $user): void
    {
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->country = $user->country;
        $this->photo = $user->photo;
        $this->title = $user->title;
        $this->description = $user->description;
        $this->date = $user->date;
    }

    /**
     * Return validation attributes for error messages.
     *
     * @return array
     */
    public function validationAttributes(): array
    {
        return [
            'first_name' => 'first name',
            'last_name' => 'last name',
            'phone' => 'phone',
            'email' => 'email',
            'country' => 'country',
            'photo' => 'photo',
            'title' => 'title',
            'description' => 'description',
            'date' => 'date'
        ];
    }
}
