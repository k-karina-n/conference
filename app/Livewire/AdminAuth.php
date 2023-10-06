<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;
use Illuminate\View\View;
use App\Livewire\Forms\AdminAuthForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminAuth extends Component
{
    public AdminAuthForm $form;

    public function render(): View
    {
        return view('livewire.admin-auth');
    }

    public function login(Request $request)
    {
        $this->form->validate();

        if (Auth::attempt($this->form->all())) {
            $request->session()->regenerate();
            return redirect('/list');
        }

        return $this->addError('login', 'Please, indicate a valid password');
    }

    public function logout(): Redirector
    {
        return redirect('/register');
    }
}
