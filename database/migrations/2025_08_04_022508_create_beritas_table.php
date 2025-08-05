<?php

namespace App\Livewire\Pages;

use App\Models\Berita;
use Livewire\Component;

class HeroNews extends Component
{
    public function render()
    {
        $beritas = Berita::with('step') // eager load step
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($berita) {
                return [
                    'judul' => $berita->judul,
                    'slug' => $berita->slug,
                    'tanggal_publish' => $berita->tanggal_publish->format('d M Y'),
                    'tatanan' => $berita->step?->step ?? 'Tidak diketahui',
                    'tatanan_no' => $berita->step?->no ?? null,
                    'tatanan_id' => $berita->step?->id ?? null,
                    'gambar' => $berita->gambar ? asset('storage/' . $berita->gambar) : asset('images/default.jpg'),
                ];
            });

        return view('livewire.pages.hero-news', compact('beritas'));
    }
}
