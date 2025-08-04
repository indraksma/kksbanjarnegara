<?php


use App\Livewire\Pages\Home;
use App\Livewire\Pages\News;
use App\Livewire\Pages\Profile;
use App\Livewire\Pages\NewsDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/profil', Profile::class)->name('profile');
Route::get('/berita', News::class)->name('news'); 
Route::get('/berita/detail', NewsDetail::class)->name('news.detail');


Route::middleware('auth')->get('/home', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', App\Livewire\Admin\Dashboard::class)->name('dashboard');
    Route::get('/files', App\Livewire\Admin\File::class)->name('files');
    Route::get('/reset-password', App\Livewire\Admin\ResetPassword::class)->name('reset-password');
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/opd', App\Livewire\Admin\Opd::class)->name('opd');
        Route::get('/user', App\Livewire\Admin\User::class)->name('user');
    });
});
