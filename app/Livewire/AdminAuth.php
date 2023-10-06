<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;
use Illuminate\View\View;
use App\Livewire\Forms\AdminAuthForm;

class AdminAuth extends Component
{
    public $admin = false;

    public AdminAuthForm $form;

    public function render(): View
    {
        return view('livewire.admin-auth');
    }

    public function login(): Redirector
    {
        return redirect('/list');
    }

    public function logout(): Redirector
    {
        return redirect('/register');
    }
}
