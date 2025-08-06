<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Berita;
use Carbon\Carbon;

class HeroNews extends Component
{
    public function render()
    {
        $beritas = Berita::with('indikator.step')
            ->latest()
            ->take(3)
            ->get()
            ->map(function ($berita) {
                return [
                    'judul' => $berita->judul,
                    'slug' => $berita->slug,
                    'tanggal_publish' => Carbon::parse($berita->tanggal_publish)->format('d M Y'),
                    'tatanan' => optional($berita->indikator?->step)->step ?? '-',
                    'gambar' => $berita->gambar ? asset('storage/files/' . $berita->gambar) : asset('images/default.jpg'),
                ];
            });

        return view('livewire.pages.hero-news', compact('beritas'));
    }
}
