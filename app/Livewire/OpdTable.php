<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Opd;

class OpdTable extends DataTableComponent
{
    protected $model = Opd::class;
    protected $listeners = ['refreshTable' => '$refresh'];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('step', 'asc');
        $this->setAdditionalSelects('opds.id');
    }

    public function columns(): array
    {
        return [
            Column::make("User", "user.email")
                ->searchable()
                ->sortable(),
            Column::make("Nama OPD", "nama")
                ->searchable()
                ->sortable(),
            Column::make("Step", "step")
                ->searchable()
                ->sortable(),
            Column::make('Aksi')
                ->label(function ($row, Column $column) {
                    return view('components.action', ['id' => $row->id]);
                }),
        ];
    }
}
