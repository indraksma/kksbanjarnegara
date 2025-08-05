<?php

namespace App\Livewire\Admin;

use App\Models\Step;
use Livewire\Component;

class Tatanan extends Component
{
    public $delete_id, $step_id, $step, $no, $status;
    protected $listeners = ['editData', 'deleteData', 'refresh' => '$refresh'];

    public function render()
    {
        $steps = Step::orderBy('no', 'ASC')->paginate(10);
        return view('livewire.admin.tatanan', compact('steps'))->extends('components.layouts.dashboard');
    }

    public function editData($id)
    {
        $this->step_id = $id;
        $data = Step::find($id);
        $this->step = $data->step;
        $this->no = $data->no;
        $this->status = $data->status;
        $this->dispatch('openModalData');
    }

    public function addData()
    {
        $this->reset(['step_id', 'step', 'no', 'status']);
        $this->dispatch('openModalData');
    }

    public function store()
    {
        $this->validate([
            'step' => 'required|string|max:255',
            'no' => 'required|integer|min:1',
        ]);

        Step::updateOrCreate(
            ['id' => $this->step_id],
            ['step' => $this->step, 'no' => $this->no, 'status' => $this->status]
        );

        $this->dispatch('alert', type: 'success', title: 'Success!', message: 'Data berhasil disimpan!', toast: false);
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->reset(['step_id', 'step', 'no', 'status']);
        $this->dispatch('closeModalData');
    }

    public function deleteData($id)
    {
        $this->delete_id = $id;
        $this->dispatch('openModalDelete');
    }

    public function destroy()
    {
        $step = Step::find($this->delete_id);
        if ($step) {
            $step->delete();
            $this->dispatch('alert', type: 'success', title: 'Success!', message: 'Data berhasil dihapus!', toast: false);
        } else {
            $this->dispatch('alert', type: 'error', title: 'Error!', message: 'Data tidak ditemukan!', toast: false);
        }
        $this->reset(['delete_id']);
        $this->dispatch('closeModalDelete');
    }
}
