@section('title', 'OPD | KKS Banjarnegara')
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
                    <h3 class="mb-0">OPD</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">OPD</li>
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

                <div class="col-12 mb-3">
                    <button wire:click="addData" type="button" class="btn btn-primary">Tambah Data</button>
                </div>
                <!--begin::Col-->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <livewire:opd-table />
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data OPD</h5>
                    <button type="button" class="btn btn-icon btn-close" wire:click="closeModal()"
                        data-bs-dismiss="modal" id="close-modal"><i class="uil uil-times fs-4 text-dark"></i></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama OPD</label>
                            <input type="text" class="form-control" id="nama" wire:model.defer="nama"
                                placeholder="Masukkan nama OPD" required>
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="step" class="form-label">Step</label>
                            <input type="number" class="form-control" id="step" wire:model.defer="step"
                                placeholder="Masukkan Step" required>
                            @error('step')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="user" class="form-label">User</label>
                            <select class="form-select" id="user" wire:model.defer="user_id" required>
                                <option value="">Pilih User</option>
                                @foreach ($user as $users)
                                    <option value="{{ $users->id }}">{{ $users->email }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </modal>
    @include('components.delete-modal')
</div>
