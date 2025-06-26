<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Illuminate\Support\Str;

class UserTable extends DataTableComponent
{
    protected $model = User::class;
    protected $listeners = ['refreshTable' => '$refresh'];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('name', 'asc');
        $this->setAdditionalSelects('users.id');
    }

    public function query()
    {
        return User::with('roles');
    }

    public function columns(): array
    {
        return [
            Column::make("Name", "name")
                ->searchable()
                ->sortable(),
            Column::make("Email", "email")
                ->searchable()
                ->sortable(),
            Column::make('Role')
                ->label(
                    function ($row, Column $column) {
                        $rolename = $row->roles->pluck('name')->first();
                        return Str::ucfirst($rolename);
                    }
                ),
            Column::make('Aksi')
                ->label(function ($row, Column $column) {
                    return view('components.action', ['id' => $row->id]);
                }),
        ];
    }
}
