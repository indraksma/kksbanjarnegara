@section('title', 'User | KKS Banjarnegara')
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
                    <h3 class="mb-0">User</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
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
                    <button wire:click="addUser" type="button" class="btn btn-primary mb-3">Tambah User</button>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <livewire:user-table />
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
                    <h5 class="modal-title">Data User</h5>
                    <button type="button" class="btn btn-icon btn-close" wire:click="closeModal()"
                        data-bs-dismiss="modal" id="close-modal"><i class="uil uil-times fs-4 text-dark"></i></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" wire:model.defer="name"
                                placeholder="Masukkan nama lengkap" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" wire:model.defer="email"
                                placeholder="Masukkan email" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" wire:model.defer="password"
                                placeholder="Masukkan password" @if ($reqpassword) required @endif>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" wire:model.defer="role_id" required>
                                <option value="">Pilih role</option>
                                @foreach ($role as $roles)
                                    <option value="{{ $roles->name }}">{{ $roles->name }}</option>
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
    <div wire:ignore x-data @editData.window="Livewire.dispatchTo('admin.user', 'editData', $event.detail.id)"></div>
    <div wire:ignore x-data @editData.window="Livewire.dispatchTo('admin.user', 'deleteData', $event.detail.id)"></div>
</div>
