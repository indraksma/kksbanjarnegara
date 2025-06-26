<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Opd;
use App\Models\File as ModelsFile;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class File extends Component
{
    use WithFileUploads;
    protected $listeners = ['editData', 'deleteData', 'refresh' => '$refresh'];
    public $file_id, $opd_id, $filename, $file, $delete_id, $opd, $inputMode = FALSE, $isDuplicate = FALSE;

    public function mount()
    {
        $this->opd = Opd::all();
    }

    public function render()
    {
        return view('livewire.admin.file')->extends('components.layouts.dashboard');
    }

    public function updated($property)
    {
        if ($property === 'filename') {
            $this->isDuplicate = false;
            $this->checkDuplicateFilename();
        }
    }

    public function triggerFilenameCheck()
    {
        $this->checkDuplicateFilename();
    }


    public function checkDuplicateFilename()
    {
        if (trim($this->filename) === '') {
            $this->isDuplicate = false;
            return;
        }

        $extension = $this->file
            ? $this->file->getClientOriginalExtension()
            : ($this->file_id
                ? pathinfo(\App\Models\File::find($this->file_id)?->filename, PATHINFO_EXTENSION)
                : 'pdf');

        $slug = \Illuminate\Support\Str::slug(pathinfo($this->filename, PATHINFO_FILENAME));
        $fullName = $slug . '.' . $extension;

        $query = \App\Models\File::where('filename', $fullName);

        if ($this->file_id) {
            $query->where('id', '!=', $this->file_id);
        }

        $this->isDuplicate = $query->exists();
    }



    public function closeModal()
    {
        $this->reset(['file_id', 'opd_id', 'filename', 'delete_id', 'file']);
        $this->inputMode = FALSE;
        $this->isDuplicate = FALSE;
    }

    public function addData()
    {
        $this->inputMode = TRUE;
        $this->dispatch('openModalData');
    }

    public function editData($id)
    {
        $data = ModelsFile::find($id);
        $this->file_id = $id;
        $this->opd_id = $data->opd_id;
        // $this->filename = $data->filename;
        $this->filename = pathinfo($data->filename, PATHINFO_FILENAME);
        $this->dispatch('openModalData');
    }

    public function store()
    {
        // 1. Determine OPD ID
        $opd_id = Auth::user()->hasRole('opd')
            ? Auth::user()->opd->id
            : $this->opd_id;

        // 2. Fetch existing record (if editing)
        $existing = ModelsFile::find($this->file_id);
        $oldFilename = $existing?->filename;

        // 3. Decide extension
        $extension = $this->file
            ? $this->file->getClientOriginalExtension()
            : pathinfo($oldFilename, PATHINFO_EXTENSION);

        // 4. Build full filename from user input
        $baseFilename = Str::slug(pathinfo($this->filename, PATHINFO_FILENAME)); // slugify here
        $newFilename = $baseFilename . '.' . $extension;

        // 5. If file was uploaded, replace the old one
        if ($this->file) {
            if ($oldFilename && Storage::disk('public')->exists('files/' . $oldFilename)) {
                Storage::disk('public')->delete('files/' . $oldFilename);
            }
            $this->file->storeAs('files', $newFilename, 'public');
        } elseif ($oldFilename && $newFilename !== $oldFilename) {
            // 6. No new file uploaded, but filename changed — rename it
            $oldPath = storage_path('app/public/files/' . $oldFilename);
            $newPath = storage_path('app/public/files/' . $newFilename);

            if (file_exists($oldPath)) {
                rename($oldPath, $newPath);
            } else {
                logger("File not found: " . $oldPath);
            }
            // if (Storage::disk('public')->exists('files/' . $oldFilename)) {
            //     Storage::disk('public')->move('files/' . $oldFilename, 'files/' . $newFilename);
            // }
        }

        // 7. Update or create DB record
        ModelsFile::updateOrCreate(['id' => $this->file_id], [
            'opd_id' => $opd_id,
            'filename' => $newFilename,
        ]);

        // 8. UI events
        $this->closeModal();
        $this->dispatch('closeModalData');
        $this->dispatch('refreshTable')->to('file-table');
        $this->dispatch('alert', type: 'success', title: 'Success!', message: 'Data berhasil disimpan!', toast: false);
    }

    public function deleteData($id)
    {
        $this->delete_id = $id;
        $this->dispatch('openModalDelete');
    }

    public function destroy()
    {
        $file = ModelsFile::find($this->delete_id);
        if ($file) {
            $filename = $file->filename;
            if (Storage::disk('public')->exists('files/' . $filename)) {
                Storage::disk('public')->delete('files/' . $filename);
            }
            $file->delete();
            $this->dispatch('alert', type: 'success', title: 'Success!', message: 'Data berhasil dihapus!', toast: false);
        } else {
            $this->dispatch('alert', type: 'error', title: 'Error!', message: 'Data tidak ditemukan!', toast: false);
        }
        $this->closeModal();
        $this->dispatch('refreshTable')->to('file-table');
        $this->dispatch('closeModalDelete');
    }
}
