<?php

use App\Filament\Guest\Pages\GameDetail;
use App\Filament\Guest\Pages\GameList;
use App\Filament\Guest\Pages\GamePlay;
use Illuminate\Support\Facades\Route;

Route::get('/', GameList::class)->name('index');
Route::get('game/{record}', GameDetail::class)->name('game.detail');
Route::get('game/{record}/play', GamePlay::class)->name('game.play');
