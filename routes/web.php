<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')
    ->name('welcome');
//Route::view('/resources/{resourceId}', 'livewire.welcome.details')
//    ->name('resources-details');
//Route::view('/gallery', 'gallery')
//    ->name('gallery');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/resources/index', \App\Livewire\Resources\Index::class)
    ->name('resources.index');
Route::get('/resources/create', \App\Livewire\Resources\Create::class)
    ->name('resources.create');
Route::get('/resources/{resourceId}/edit', \App\Livewire\Resources\Edit::class)
    ->name('resources.edit');
Route::get('/resources/{resourceId}/details', \App\Livewire\Resources\Components\Details::class)
    ->name('resources.details');
Route::get('/resources/{resourceId}/galleries', \App\Livewire\Resources\Components\Galleries::class)
    ->name('resources.galleries');

require __DIR__.'/auth.php';
