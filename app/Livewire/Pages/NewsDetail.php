<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;

#[Lazy]
class NewsDetail extends Component
{

    public function placeholder()
    {
        return view('placeholder.news-detail');
    }

    #[Title('KKS Banjarnegara | Detail Berita')]
    public function render()
    {
        return view('livewire.pages.news-detail');
    }
}

