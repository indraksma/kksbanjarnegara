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
                // Konversi status numerik ke label
                switch ($step->status) {
                    case 2:
                        $status = 'Tercapai';
                        $statusColor = 'text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900';
                        $statusIcon = <<<SVG
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        SVG;
                        break;

                    case 1:
                        $status = 'Proses';
                        $statusColor = 'text-yellow-500 dark:text-yellow-400 bg-yellow-100 dark:bg-yellow-900';
                        $statusIcon = <<<SVG
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 6v6l4 2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        SVG;
                        break;

                    default:
                        $status = 'Belum Tercapai';
                        $statusColor = 'text-red-600 dark:text-red-400 bg-red-100 dark:bg-red-900';
                        $statusIcon = <<<SVG
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        SVG;
                        break;
                }


                return [
                    'id' => $step->id,
                    'slug' => Str::slug($step->step),
                    'no' => $step->id,
                    'judul' => $step->step,
                    'jumlah' => $step->indikator_count,
                    'status' => $status,
                    'statusColor' => $statusColor,
                    'statusIcon' => $statusIcon,
                ];
            });


        return view('livewire.pages.home', [
            'tatanans' => $tatanans,
            'beritaTerbaru' => $this->beritaTerbaru,
      
        ]);
    }
}
