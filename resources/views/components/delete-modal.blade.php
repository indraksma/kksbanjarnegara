<!-- Modal Hapus -->
<div wire:ignore.self class="modal fade" data-bs-backdrop="static" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn btn-icon btn-close" wire:click="closeModal()" data-bs-dismiss="modal"
                    id="close-modal"><i class="uil uil-times fs-4 text-dark"></i></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin akan menghapus data tersebut?</p>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal()" class="btn btn-dark close-btn"
                    data-bs-dismiss="modal">Batal</button>
                <button type="button" wire:click.prevent="destroy()" class="btn btn-danger close-modal">Ya,
                    Hapus</button>
            </div>
        </div>
    </div>
</div>
