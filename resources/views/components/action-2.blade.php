<a href="{{ url('/beritas/editor?id=' . $id) }}"><button class="btn btn-warning btn-sm mb-2">
        Edit
    </button></a>

<button x-data @click="Livewire.dispatch('deleteData', { id: {{ $id }} })" class="btn btn-danger btn-sm mb-2">
    Hapus
</button>
