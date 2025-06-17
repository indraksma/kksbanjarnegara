<?php


use App\Livewire\HomePage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('homepage');


Route::middleware('auth')->get('/home', function () {
    return view('welcome');
});
