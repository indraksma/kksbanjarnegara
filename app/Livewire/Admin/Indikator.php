<?php

namespace App\Livewire\Admin;

use App\Models\Indikator as ModelsIndikator;
use App\Models\Step;
use Livewire\Component;

class Indikator extends Component
{
    public $delete_id, $indikator_id, $indikator, $step_id, $steps, $nomor;
    protected $listeners = ['editData', 'deleteData', 'refresh' => '$refresh'];

    public function mount()
    {
        $this->steps = Step::all();
    }

    public function render()
    {
        $indikators = ModelsIndikator::paginate(10);
        return view('livewire.admin.indikator', compact('indikators'))->extends('components.layouts.dashboard');
    }

    public function editData($id)
    {
        $this->indikator_id = $id;
        $indikator = ModelsIndikator::find($id);
        $this->step_id = $indikator->step_id;
        $this->indikator = $indikator->nama;
        $this->nomor = $indikator->nomor;
        $this->dispatch('openModalData');
    }

    public function addData()
    {
        $this->reset(['indikator_id', 'indikator', 'step_id', 'nomor']);
        $this->dispatch('openModalData');
    }

    public function store()
    {
        $this->validate([
            'indikator' => 'required|string|max:255',
            'nomor' => 'required|integer|min:1',
            'step_id' => 'required|exists:steps,id',
        ]);

        ModelsIndikator::updateOrCreate(
            ['id' => $this->indikator_id],
            ['nama' => $this->indikator, 'step_id' => $this->step_id, 'nomor' => $this->nomor]
        );

        $this->dispatch('alert', type: 'success', title: 'Success!', message: 'Data berhasil disimpan!', toast: false);
        $this->reset(['indikator_id', 'indikator', 'step_id', 'nomor']);
        $this->dispatch('closeModalData');
    }

    public function closeModal()
    {
        $this->reset(['indikator_id', 'indikator', 'step_id', 'nomor']);
        $this->dispatch('closeModalData');
    }

    public function deleteData($id)
    {
        $this->delete_id = $id;
        $this->dispatch('openModalDelete');
    }

    public function destroy()
    {
        $indikator = ModelsIndikator::find($this->delete_id);
        if ($indikator) {
            $indikator->delete();
            $this->dispatch('alert', type: 'success', title: 'Success!', message: 'Data berhasil dihapus!', toast: false);
        } else {
            $this->dispatch('alert', type: 'error', title: 'Error!', message: 'Data tidak ditemukan!', toast: false);
        }
        $this->reset(['delete_id']);
        $this->dispatch('closeModalDelete');
    }
}
