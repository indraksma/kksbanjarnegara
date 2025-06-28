<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\File;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class FileTable extends DataTableComponent
{
    protected $model = File::class;
    protected $listeners = ['refreshTable' => '$refresh'];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setAdditionalSelects('files.id');
    }

    public function builder(): Builder
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return File::query()->with('opd');
        }

        if ($user->hasRole('opd')) {
            $opdId = $user->opd?->id;

            return File::query()
                ->where('opd_id', $opdId)
                ->with('opd');
        }

        return File::query()->whereNull('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Opd", "opd.nama")
                ->searchable()
                ->sortable(),
            Column::make("Step", "opd.step")
                ->searchable()
                ->sortable(),
            Column::make("Filename", "filename")
                ->searchable()
                ->sortable()
                ->format(function ($value, $row, Column $column) {
                    $fileUrl = asset('storage/files/' . $row->filename);
                    return <<<HTML
                        <div class="d-flex align-items-center gap-2">
                            <span>{$value}</span>
                            <a href="{$fileUrl}" target="_blank" class="btn btn-sm btn-outline-primary" title="View File">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    HTML;
                })->html(),
            Column::make("Upload Date", "created_at")
                ->searchable()
                ->sortable(),
            Column::make('Aksi')
                ->label(function ($row, Column $column) {
                    return view('components.action', ['id' => $row->id]);
                }),
        ];
    }
}
