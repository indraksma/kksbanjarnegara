<?php


use App\Livewire\HomePage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('homepage');


Route::middleware('auth')->get('/home', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', App\Livewire\Admin\Dashboard::class)->name('dashboard');
    Route::get('/opd', App\Livewire\Admin\Opd::class)->name('opd');
    Route::get('/files', App\Livewire\Admin\File::class)->name('files');
});
