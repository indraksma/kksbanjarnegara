<?php

namespace App\Livewire\Pages;

use App\Models\Berita;
use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;

#[Lazy]
class NewsDetail extends Component
{

    public Berita $berita;
    public $beritaLainnya = [];

    public function mount($slug)
    {
        $this->berita = Berita::where('slug', $slug)->firstOrFail();

        // Ambil berita lain untuk rekomendasi
        $this->beritaLainnya = Berita::where('slug', '!=', $slug)
            ->latest()
            ->take(3)
            ->get();
    }

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

