<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $countFile = \App\Models\File::count();
        return view('livewire.admin.dashboard', compact('countFile'))->extends('components.layouts.dashboard');
    }
}
