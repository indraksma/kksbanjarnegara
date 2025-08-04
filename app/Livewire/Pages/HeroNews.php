<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class HeroNews extends Component
{
    public function render()
    {
        $beritas = [
            [
                'judul' => 'Usulkan Forum Etika Global 2026, Indonesia Siap Pimpin Dialog Negara Selatan',
                'tanggal_publish' => '2025-07-30',
                'kategori' => 'Siaran Pers',
                'gambar' => asset('images/images (1).jpeg'),
            ],
            [
                'judul' => 'KKS Banjarnegara Kembali Raih Penghargaan Nasional',
                'tanggal_publish' => '2025-07-28',
                'kategori' => 'Penghargaan',
                'gambar' => asset('images/images (2).jpeg'),
            ],
            [
                'judul' => 'Rapat Koordinasi Forum Kabupaten Kota Sehat Digelar',
                'tanggal_publish' => '2025-07-25',
                'kategori' => 'Kegiatan',
                'gambar' => asset('images/images (3).jpeg'),
            ],
        ];

        return view('livewire.pages.hero-news', compact('beritas'));
    }

}
