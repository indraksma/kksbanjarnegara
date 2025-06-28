@section('title', 'File Management | KKS Banjarnegara')
@push('bodyscripts')
    <script>
        window.addEventListener('openModalData', event => {
            const modalData = document.querySelector('#dataModal');
            const modal_data = bootstrap.Modal.getOrCreateInstance(modalData);
            modal_data.show();
        });
        window.addEventListener('closeModalData', event => {
            const modalData = document.querySelector('#dataModal');
            const modal_data = bootstrap.Modal.getInstance(modalData);
            modal_data.hide();
        });
        window.addEventListener('openModalDelete', event => {
            const modal_hapus = document.querySelector('#deleteModal');
            const modal_hps = bootstrap.Modal.getOrCreateInstance(modal_hapus);
            modal_hps.show();
        });
        window.addEventListener('closeModalDelete', event => {
            const modal_hapus = document.querySelector('#deleteModal');
            const modal_hps = bootstrap.Modal.getInstance(modal_hapus);
            modal_hps.hide();
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
                    <h3 class="mb-0">File</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">File</li>
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
                    <button wire:click="addData" type="button" class="btn btn-primary mb-3">Tambah File</button>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <livewire:file-table />
                        </div>
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <modal wire:ignore.self class="modal fade" data-bs-backdrop="static" id="dataModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">File Upload</h5>
                    <button type="button" class="btn btn-icon btn-close" wire:click="closeModal()"
                        data-bs-dismiss="modal" id="close-modal"><i class="uil uil-times fs-4 text-dark"></i></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                            <label for="file" class="form-label">File</label>
                            <input type="file" class="form-control" id="file" wire:model="file"
                                @if ($inputMode) required @endif>
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="filename" class="form-label">Nama File (Tanpa Ekstensi / Format File)</label>
                            <input wire:model.debounce.500ms="filename" wire:change="triggerFilenameCheck"
                                class="form-control @if ($isDuplicate) is-invalid @endif" required>

                            @error('filename')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @if ($isDuplicate)
                                <span class="text-danger">Nama file sudah digunakan. Silakan gunakan nama lain.</span>
                            @endif
                        </div>
                        {{-- <div class="mb-3">
                            <label for="filename" class="form-label">Nama File (Tanpa Ekstensi / Format File)</label>
                            <input type="text" class="form-control" id="filename" wire:model.defer="filename"
                                required>
                            @error('filename')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        @role('admin')
                            <div class="mb-3">
                                <label for="opd" class="form-label">Opd</label>
                                <select class="form-select" id="opd" wire:model.defer="opd_id" required>
                                    <option value="">Pilih OPD</option>
                                    @foreach ($opd as $opds)
                                        <option value="{{ $opds->id }}">{{ $opds->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endauth
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled"
                            wire:target="file,store" @if ($isDuplicate) disabled @endif>
                            Simpan
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </modal>
    @include('components.delete-modal')
</div>
