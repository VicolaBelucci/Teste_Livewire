<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Login extends Component
{
    #[Rule('required')]
    public $email;

    #[Rule('required')]
    public $password;

    public function login()
    {
        $authenticated = Auth::attempt([
            'email'=> $this->email,
            'password' => $this->password,
        ]);

        if(!$authenticated){
            return session()->flash('error', 'Email or passord not found!');
        }

        // return redirect('/');
    }

    public function logout()
    {
        
        auth()->logout();

        return redirect('/');
    }
    public function render()
    {
        return view('livewire.login');
    }
}
