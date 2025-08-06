<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Lazy;  
use Livewire\Attributes\Title;
use Illuminate\Support\Str;
use App\Models\Berita;
use App\Models\Step;
use App\Models\Indikator;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\On;

#[Lazy]
class News extends Component
{
    use WithPagination;

    public $steps;
    public $indikators = [];

    #[Url(as: 'tatanan')]
    public ?string $selectedTatananSlug = null;

    #[Url(as: 'indikator')]
    public ?int $filterIndikatorId = null;

    public $filterStepId = null;
    public $search = '';

    public function placeholder()
    {
        return view('placeholder.news');
    }

    public function mount()
    {
        $this->steps = Step::orderBy('no')->get();

        if ($this->selectedTatananSlug) {
            $matched = $this->steps->first(fn($step) => Str::slug($step->step) === $this->selectedTatananSlug);
            $this->filterStepId = $matched?->id;
        }

        if ($this->filterIndikatorId) {
            $indikator = Indikator::find($this->filterIndikatorId);
            if ($indikator) {
                $this->filterStepId = $indikator->step_id;
            }
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterStepId()
    {
        $this->resetPage();
    }

    public function updatingFilterIndikatorId()
    {
        $this->resetPage();
    }

    public function loadIndikators()
    {
        $this->indikators = Indikator::when($this->filterStepId, fn($q) =>
            $q->where('step_id', $this->filterStepId)
        )->orderBy('nomor')->get();
    }

    public function getBeritasProperty()
    {
        return Berita::orderBy('tanggal_publish', 'desc')
            ->when($this->filterStepId, fn($q) => $q->where('step_id', $this->filterStepId))
            ->when($this->filterIndikatorId, fn($q) => $q->where('indikator_id', $this->filterIndikatorId))
            ->when($this->search, fn($q) =>
                $q->where('judul', 'like', '%' . $this->search . '%')
            )
            ->paginate(9);
    }

    public function filterByStep($stepId = null)
    {
        $step = Step::find($stepId);
        $this->selectedTatananSlug = $step?->slug;
        $this->filterStepId = $step?->id;
        $this->filterIndikatorId = null;
        $this->resetPage();
        $this->loadIndikators();
    }

    public function filterByIndikator($indikatorId)
    {
        $this->filterIndikatorId = $indikatorId;
        $this->resetPage();
    }

    #[On('navigateToTatanan')]
    public function navigateToTatanan($slug)
    {
        $this->selectedTatananSlug = $slug;

        $matched = $this->steps->first(fn($step) => Str::slug($step->step) === $slug);
        $this->filterStepId = $matched?->id;
        $this->filterIndikatorId = null;

        $this->resetPage();
        $this->loadIndikators();
    }

    #[Title('KKS Banjarnegara | Berita')]
    public function render()
    {
        $this->loadIndikators();

        return view('livewire.pages.news', [
            'selectedTatananSlug' => $this->selectedTatananSlug,
            'beritas' => $this->beritas
        ]);
    }
}
