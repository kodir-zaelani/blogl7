<?php

namespace App\Http\Livewire\Backend\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
/**
     * logout function
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('root');
    }

    public function render()
    {
        return view('livewire.backend.admin.logout');
    }
}
