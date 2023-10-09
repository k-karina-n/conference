<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class UserDataForm extends Form
{
    public $rules;

    public $first_name;

    public $last_name;

    public $phone;

    public $email;

    public $country;

    public $photo;

    public $title;

    public $description;

    public $date;

    public function validatePersonalData()
    {
        $this->rules = ([
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'phone' => 'required|max:18',
            'email' => 'required|email|unique:users,email',
            'country' => 'required',
            'photo' => 'required',
        ]);

        return $this->validate();
    }

    public function validateConferenceData()
    {
        $this->rules = ([
            'title' => 'required',
            'description' => 'required|max:1000',
            'date' => 'required|after_or_equal:today'
        ]);

        return $this->validate();
    }

    public function storePhoto()
    {
        $name = $this->photo->getClientOriginalName();

        $this->photo->storeAs('photos', $name, 'public');

        $this->photo = $name;
    }

    public function validationAttributes() 
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
