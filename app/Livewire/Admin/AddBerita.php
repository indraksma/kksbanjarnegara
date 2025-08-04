<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\Indikator;
use App\Models\Step;
use App\Models\Berita as ModelsBerita;
use Illuminate\Support\Facades\Auth;

class AddBerita extends Component
{
    use WithFileUploads;

    public $id = null;
    public $berita_id, $judul, $content, $gambar, $step_id, $indikator_id, $steps, $indikators, $fngambar, $tanggal_publish;
    public $editMode = false;

    public function mount()
    {
        $this->id = request()->query('id', '');
        if ($this->id) {
            $this->editMode = true;
            $this->berita_id = $this->id;
            $berita = ModelsBerita::find($this->id);
            if ($berita) {
                $this->judul = $berita->judul;
                $this->content = $berita->isi;
                $this->fngambar = $berita->gambar;
                $this->step_id = $berita->step_id;
                $this->indikators = Indikator::where('step_id', $berita->step_id)->get();
                $this->indikator_id = $berita->indikator_id;
                $this->tanggal_publish = $berita->tanggal_publish;
            }
        }
        $this->steps = Step::all();
    }

    public function render()
    {
        return view('livewire.admin.add-berita')->extends('components.layouts.dashboard');
    }

    public function changeIndikator()
    {
        $this->indikators = Indikator::where('step_id', $this->step_id)->get();
    }

    public function generateSlug(string $title): string
    {
        return Str::slug($title, '-');
    }

    public function store()
    {
        $this->validate([
            'judul' => 'required|string|max:255',
            'content' => 'required|string',
            'gambar' => $this->editMode ? '' : 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'step_id' => 'required|exists:steps,id',
            'indikator_id' => 'required|exists:indikators,id',
        ]);

        $berita = ModelsBerita::updateOrCreate(
            ['id' => $this->berita_id],
            [
                'judul' => $this->judul,
                'slug' => $this->generateSlug($this->judul),
                'isi' => $this->content,
                'step_id' => $this->step_id,
                'penulis' => Auth::user()->name,
                'tanggal_publish' => $this->tanggal_publish,
                'indikator_id' => $this->indikator_id,
                'gambar' => $this->editMode ? ($this->gambar ? $this->gambar->store('files', 'public') : $this->fngambar) : $this->gambar->store('files', 'public'),
            ]
        );

        if ($berita) {
            $this->dispatch('alert', type: 'success', title: 'Success!', message: 'Data berhasil disimpan!', toast: false);
        } else {
            $this->dispatch('alert', type: 'error', title: 'Error!', message: 'Data gagal disimpan!', toast: false);
        }

        $this->redirect(route('berita'));
    }
}
