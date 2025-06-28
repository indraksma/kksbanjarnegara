<?php

namespace App\Livewire\Admin;

use App\Models\Opd as ModelsOpd;
use App\Models\User;
use Livewire\Component;

class Opd extends Component
{
    protected $listeners = ['editData', 'deleteData', 'refresh' => '$refresh'];
    public $opd_id, $user_id, $nama, $step, $delete_id, $user;

    public function mount()
    {
        $this->user = User::all();
    }

    public function render()
    {
        return view('livewire.admin.opd')->extends('components.layouts.dashboard');
    }

    public function closeModal()
    {
        $this->reset(['opd_id', 'user_id', 'nama', 'step', 'delete_id']);
    }

    public function addData()
    {
        $this->dispatch('openModalData');
    }

    public function editData($id)
    {
        $this->dispatch('openModalData');
        $data = ModelsOpd::find($id);
        $this->opd_id = $id;
        $this->user_id = $data->user_id;
        $this->nama = $data->nama;
        $this->step = $data->step;
    }

    public function store()
    {
        ModelsOpd::updateOrCreate(['id' => $this->opd_id], [
            'user_id' => $this->user_id,
            'nama' => $this->nama,
            'step' => $this->step,
        ]);
        $this->closeModal();
        $this->dispatch('closeModalData');
        $this->dispatch('refreshTable')->to('opd-table');
        $this->dispatch(
            'alert',
            type: 'success',
            title: 'Success!',
            message: 'Data berhasil disimpan!',
            toast: false
        );
    }

    public function deleteData($id)
    {
        $this->delete_id = $id;
        $this->dispatch('openModalDelete');
    }

    public function destroy()
    {
        ModelsOpd::destroy($this->delete_id);
        $this->dispatch('closeModalDelete');
        $this->dispatch('refreshTable')->to('opd-table');
        $this->dispatch(
            'alert',
            type: 'success',
            title: 'Success!',
            message: 'Data berhasil dihapus!',
            toast: false
        );
    }
}
