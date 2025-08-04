<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Lazy;  
use Livewire\Attributes\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Livewire\WithPagination;

#[Lazy]
class News extends Component
{

    public function placeholder()
    {
        return view('placeholder.news');
    }

    #[Title('KKS Banjarnegara | Berita')]
    public function render()
    {
        return view('livewire.pages.news');
    }
}
