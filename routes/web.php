<?php

use App\Livewire\GroupCreate;
use App\Livewire\EventShow;
use Illuminate\Support\Facades\Route;

//Route::view('/', 'welcome');

Route::get('/', EventShow::class);

Route::get('/groups/create', GroupCreate::class)->middleware(['auth', 'role:member']);


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
