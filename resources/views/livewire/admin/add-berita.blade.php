@section('title', 'Editor Berita | KKS Banjarnegara')
@push('headscripts')
    <link rel="stylesheet" href="https://unpkg.com/trix@2.1.0/dist/trix.css">
    <style>
        trix-toolbar .trix-button-group--file-tools {
            display: none;
        }
    </style>
@endpush
@push('bodyscripts')
    <script src="https://unpkg.com/trix@2.1.0/dist/trix.umd.min.js"></script>
    <script>
        document.addEventListener("trix-file-accept", function(event) {
            event.preventDefault();
        });
    </script>
@endpush
<div>
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Berita</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('berita') }}">Berita</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form wire:submit.prevent="store">
                                <div class="mb-3">
                                    <label class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="judul" wire:model="judul"
                                        required>
                                    @error('judul')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Isi</label>
                                    <div x-data="{ initContent: @js($content) }" x-init="const trixInput = document.getElementById('trix-content');
                                    const trixEditor = document.querySelector('trix-editor');
                                    
                                    // Set initial content
                                    trixInput.value = initContent;
                                    trixEditor.editor.loadHTML(initContent);
                                    
                                    // Sync back to Livewire
                                    document.addEventListener('trix-change', () => {
                                        $wire.set('content', trixInput.value);
                                    });" wire:ignore>
                                        <input id="trix-content" type="hidden">
                                        <trix-editor input="trix-content"></trix-editor>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar</label><br />
                                    @if ($fngambar)
                                        <a class="btn btn-primary mb-2" href="{{ asset('storage/' . $fngambar) }}"
                                            target="_blank">Lihat Gambar</a>
                                    @endif
                                    <input type="file" class="form-control" wire:model="gambar"
                                        @if (!$editMode) required @endif>
                                    @error('gambar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tatanan</label>
                                    <select class="form-select" wire:model="step_id" wire:change="changeIndikator()"
                                        required>
                                        <option value="">Pilih Tatanan</option>
                                        @foreach ($steps as $step)
                                            <option value="{{ $step->id }}">{{ $step->step }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Indikator</label>
                                    <select class="form-select" wire:model="indikator_id" required>
                                        <option value="">Pilih Indikator</option>
                                        @if ($indikators)
                                            @foreach ($indikators as $indikator)
                                                <option value="{{ $indikator->id }}">{{ $indikator->nama }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Publish</label>
                                    <input type="date" class="form-control" wire:model="tanggal_publish"
                                        value="{{ date('Y-m-d') }}" required>
                                    @error('tanggal_publish')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled"
                                    wire:target="gambar,store">
                                    Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
</div>
