<?php

use App\Livewire\EventCreate;
use App\Livewire\EventEdit;
use App\Livewire\EventIndex;
use App\Livewire\EventShow;
use App\Livewire\GroupCreate;
use App\Livewire\GroupEdit;
use App\Livewire\GroupIndex;
use App\Livewire\GroupShow;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->middleware('guest');

Route::get('/events', EventIndex::class)->name('events.index');
Route::get('/events/create', EventCreate::class)->middleware(['auth', 'role:organizer'])->name('events.create');
Route::get('/events/{event}', EventShow::class)->name('events.show');
Route::get('/events/{event}/edit', EventEdit::class)->middleware(['auth', 'role:organizer'])->name('events.edit');

Route::get('/groups', GroupIndex::class)->name('groups.index');
Route::get('/groups/create', GroupCreate::class)->middleware(['auth', 'role:member'])->name('groups.create');
Route::get('/groups/{group}', GroupShow::class)->name('groups.show');
Route::get('/groups/{group}/edit', GroupEdit::class)->middleware(['auth', 'role:organizer'])->name('groups.edit');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
