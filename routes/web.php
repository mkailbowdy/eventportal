<?php

use App\Livewire\EventCreate;
use App\Livewire\EventIndex;
use App\Livewire\EventShow;
use App\Livewire\GroupCreate;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/events', EventIndex::class)->name('events.index');
Route::get('/events/create', EventCreate::class)->middleware(['auth', 'role:organizer'])->name('events.create');
Route::get('/events/{event}', EventShow::class);


Route::get('/groups/create', GroupCreate::class)->middleware(['auth', 'role:member'])->name('groups.create');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
