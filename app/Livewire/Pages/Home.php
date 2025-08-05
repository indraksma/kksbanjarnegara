<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Step;
use Illuminate\Support\Str;
use App\Models\Berita;

class Home extends Component
{

    public $beritaTerbaru;


    public function mount()
    {
        $this->beritaTerbaru = Berita::latest()->take(3)->get();

    }


    public function render()
    {
        $tatanans = Step::withCount('indikator')
            ->orderBy('id')
            ->get()
            ->map(function ($step) {
                $status = $step->id <= 6 ? 'Tercapai' : ($step->id <= 8 ? 'Proses' : 'Belum');
                return [
                    'id' => $step->id,
                    'slug' => Str::slug($step->step), // generate slug sementara
                    'no' => $step->id,
                    'judul' => $step->step,
                    'jumlah' => $step->indikator_count,
                    'status' => $status,
                ];
            });


        return view('livewire.pages.home', [
            'tatanans' => $tatanans,
            'beritaTerbaru' => $this->beritaTerbaru,
      
        ]);
    }
}
