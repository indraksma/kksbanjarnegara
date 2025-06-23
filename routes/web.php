<?php


use App\Livewire\HomePage;
use App\Livewire\Pages\Kelembagaan;
use App\Livewire\Pages\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('homepage');
Route::get('/profil', Profile::class)->name('profile');
Route::get('/kelembagaan', Kelembagaan::class)->name('kelembagaan');


Route::middleware('auth')->get('/home', function () {
    return view('welcome');
});
