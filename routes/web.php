<?php


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
