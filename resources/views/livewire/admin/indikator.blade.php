@section('title', 'Indikator Tatanan | KKS Banjarnegara')
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
                    <h3 class="mb-0">Indikator Tatanan</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Indikator</li>
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
                    <button type="button" class="btn btn-primary mb-3" wire:click="addData">Tambah</button>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tatanan / Step</th>
                                        <th>No Indikator</th>
                                        <th>Indikator</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($indikators as $index => $indikator)
                                        <tr>
                                            <td>{{ $indikator->step->step }}</td>
                                            <td>{{ $indikator->nomor }}</td>
                                            <td>{{ $indikator->nama }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-warning"
                                                    wire:click="editData({{ $indikator->id }})">Edit</button>
                                                <button class="btn btn-sm btn-danger"
                                                    wire:click="deleteData({{ $indikator->id }})">Hapus</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $indikators->links() }}
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
                    <h5 class="modal-title">Indikator Tatanan</h5>
                    <button type="button" class="btn btn-icon btn-close" wire:click="closeModal()"
                        data-bs-dismiss="modal" id="close-modal"><i class="uil uil-times fs-4 text-dark"></i></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                            <label for="step" class="form-label">Tatanan</label>
                            <select class="form-select" id="step" wire:model="step_id" required>
                                <option value="">Pilih Tatanan</option>
                                @foreach ($steps as $stp)
                                    <option value="{{ $stp->id }}">{{ $stp->step }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="indikator" class="form-label">Indikator</label>
                            <input type="text" class="form-control" id="indikator" wire:model.defer="indikator"
                                required>
                            @error('indikator')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nomor" class="form-label">No Indikator</label>
                            <input type="number" class="form-control" id="nomor" wire:model.defer="nomor" required>
                            @error('step')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </modal>
    @include('components.delete-modal')
</div>
