<?php

use App\Livewire\GroupCreate;
use App\Livewire\EventShow;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/events', EventShow::class)->name('events');
Route::get('events/create', EventShow::class)->name('events.create');

Route::get('/groups/create', GroupCreate::class)->middleware(['auth', 'role:member'])->name('groups.create');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
