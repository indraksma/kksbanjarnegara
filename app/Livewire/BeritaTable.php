<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Berita;

class BeritaTable extends DataTableComponent
{
    protected $model = Berita::class;
    protected $listeners = ['refreshTable' => '$refresh'];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setAdditionalSelects('beritas.id');
    }

    public function columns(): array
    {
        return [
            Column::make("Judul", "judul")
                ->searchable()
                ->sortable(),
            Column::make("Tatanan", "step.step")
                ->searchable()
                ->sortable(),
            Column::make("Indikator", "indikator.nama")
                ->searchable()
                ->sortable(),
            Column::make("Tanggal Publish", "tanggal_publish")
                ->searchable()
                ->sortable(),
            Column::make("Created at", "created_at")
                ->searchable()
                ->sortable(),
            Column::make('Aksi')
                ->label(function ($row, Column $column) {
                    return view('components.action-2', ['id' => $row->id]);
                }),
        ];
    }
}
