<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Berita as ModelsBerita;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Berita extends Component
{
    use WithFileUploads;

    public $delete_id;

    protected $listeners = ['deleteData', 'refresh' => '$refresh'];


    public function render()
    {
        return view('livewire.admin.berita')->extends('components.layouts.dashboard');
    }

    public function deleteData($id)
    {
        $this->delete_id = $id;
        $this->dispatch('openModalDelete');
    }

    public function destroy()
    {
        $berita = ModelsBerita::find($this->delete_id);
        if ($berita) {
            $filename = $berita->gambar;
            if (Storage::disk('public')->exists($filename)) {
                Storage::disk('public')->delete($filename);
            }
            $berita->delete();
            $this->dispatch('alert', type: 'success', title: 'Success!', message: 'Data berhasil dihapus!', toast: false);
        } else {
            $this->dispatch('alert', type: 'error', title: 'Error!', message: 'Data tidak ditemukan!', toast: false);
        }
        $this->reset(['delete_id']);
        $this->dispatch('refreshTable')->to('berita-table');
        $this->dispatch('closeModalDelete');
    }
}
