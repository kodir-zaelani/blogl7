<?php

namespace App\Http\Livewire\Backend\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    /**
     * public variable
     */
    public $email;
    public $password;

    /**
     * login function
     */
    public function login()
    {
        $this->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if(Auth::attempt(['email' => $this->email, 'password'=> $this->password])) {

            return redirect()->route('dashboard.index');

        } else {
            session()->flash('error', 'Your Email Address or Password is incorrect.');
            return redirect()->route('backend.login');
        }
    }
    
    public function render()
    {
        return view('livewire.backend.admin.login');
    }
}
