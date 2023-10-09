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
    /**
     * The form to validate admin data.
     *
     * @var AdminAuthForm The form object.
     */
    public AdminAuthForm $form;

     /**
     * Render the component view.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.admin-auth');
    }

    /**
     * Validate provided admin data and attempt to authenticate an admin.
     *
     * @param Request $request
     * @return Redirector|void
     */
    public function login(Request $request): Redirector
    {
        $this->form->validate();

        if (Auth::attempt($this->form->all())) {
            $request->session()->regenerate();
            return redirect('/list');
        }

        return $this->addError('login', 'Please, indicate a valid password');
    }

    /**
     * Logout an admin.
     *
     * @param Request $request
     * @return Redirector
     */
    public function logout(Request $request): Redirector
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/registration');
    }
}
