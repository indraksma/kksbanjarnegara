<?php

namespace App\Livewire\Pages;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Lazy;   

#[Lazy]
class Profile extends Component
{

    #[Title('KKS Banjarnegara | Profil')]
    public function render()
    {
        return view('livewire.pages.profile');
    }
}
