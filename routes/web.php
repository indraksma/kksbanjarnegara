<?php

use App\Livewire\Admin\TestDropdown;
use App\Livewire\HomePage;
use App\Livewire\Page\News;
use App\Livewire\Pages\Kelembagaan;
use App\Livewire\Pages\Profile;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', HomePage::class)->name('homepage');
Route::get('/profil', Profile::class)->name('profile');
Route::get('/kelembagaan', Kelembagaan::class)->name('kelembagaan');
Route::get('/berita', News::class)->name('news');


Route::middleware('auth')->get('/home', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', App\Livewire\Admin\Dashboard::class)->name('dashboard');
    Route::get('/beritas', App\Livewire\Admin\Berita::class)->name('berita');
    Route::get('/beritas/editor', App\Livewire\Admin\AddBerita::class)->name('berita.editor');
    Route::get('/files', App\Livewire\Admin\File::class)->name('files');
    Route::get('/reset-password', App\Livewire\Admin\ResetPassword::class)->name('reset-password');
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/opd', App\Livewire\Admin\Opd::class)->name('opd');
        Route::get('/user', App\Livewire\Admin\User::class)->name('user');
    });
});
