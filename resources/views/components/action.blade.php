<button x-data @click="Livewire.dispatch('editData', { id: {{ $id }} })" class="btn btn-warning btn-sm mb-2">
    Edit
</button>

<button x-data @click="Livewire.dispatch('deleteData', { id: {{ $id }} })" class="btn btn-danger btn-sm mb-2">
    Hapus
</button>
