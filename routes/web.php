<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Main;
use App\Livewire\MusicPlayer;

Route::get('/', Main::class);
Route::get('/test', MusicPlayer::class);
