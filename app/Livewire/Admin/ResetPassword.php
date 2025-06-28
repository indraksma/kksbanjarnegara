<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPassword extends Component
{
    public $oldPassword, $newPassword;

    public function render()
    {
        return view('livewire.admin.reset-password')->extends('components.layouts.dashboard');
    }

    public function resetPassword()
    {
        $this->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:8',
        ]);

        $user = Auth::user();

        if (!Hash::check($this->oldPassword, $user->password)) {
            $this->addError('oldPassword', 'The current password is incorrect.');
            return;
        }

        $user->update([
            'password' => bcrypt($this->newPassword),
        ]);

        session()->flash('success', 'Password updated successfully.');
        $this->reset(['oldPassword', 'newPassword']);
    }
}
