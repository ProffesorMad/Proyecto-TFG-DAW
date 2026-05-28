<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChampionController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RandomBuildController;
use App\Http\Controllers\TierListController;

Route::get('/', function ()
{
    return view('welcome');
});

Route::get('/dashboard', function ()
{
    return redirect('/');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function ()
{
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('champions', ChampionController::class);

Route::resource('items', ItemController::class);

Route::get('/roles', [RoleController::class, 'index'])
    ->name('roles.index');

Route::get('/roles/{role}', [RoleController::class, 'show'])
    ->name('roles.show');

Route::resource('spells', App\Http\Controllers\SpellController::class);

Route::resource('game-modes', App\Http\Controllers\GameModeController::class);

Route::middleware('auth')->group(function ()
{
    Route::get('/randomizer', [RandomBuildController::class, 'index'])
        ->name('randomizer.index');

    Route::post('/randomizer/generate', [RandomBuildController::class, 'generate'])
        ->name('randomizer.generate');

    Route::post('/randomizer/save', [RandomBuildController::class, 'save'])
        ->name('randomizer.save');

    Route::get('/my-builds', [RandomBuildController::class, 'myBuilds'])
        ->name('randomizer.builds');
});

Route::middleware('auth')->group(function ()
{
    Route::get('/tierlists', [TierListController::class, 'index'])
        ->name('tierlists.index');
});

require __DIR__.'/auth.php';
