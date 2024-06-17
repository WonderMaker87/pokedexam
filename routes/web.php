<?php

use App\Http\Controllers\AttackController;
use App\Http\Controllers\PokedexController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('types', TypeController::class);
    Route::resource('attacks', AttackController::class);
    Route::resource('pokemons', PokemonController::class);
});

Route::get('/', [PokedexController::class, 'index'])->name('pokedex.index');
Route::get('/pokemon/{id}', [PokedexController::class, 'show'])->name('pokedex.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
