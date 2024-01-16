<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProfileController;
use App\Models\Articulo;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('articulos.index', [
        'articulos' => Articulo::all(),
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('categorias', CategoriaController::class)->middleware('auth');

// El index va a ser público, pero para los demás métodos tienes que estar registrado.

Route::resource('articulos', ArticuloController::class)->except(['index'])->middleware('auth');
Route::get('articulos', [ArticuloController::class, 'index'])->name('articulos.index');

Route::get('/cambiar_imagen/{articulo}', [ArticuloController::class, 'cambiar_imagen'])
    ->name('articulos.cambiar_imagen')->whereNumber('articulo');

Route::post('/cambiar_imagen/{articulo}', [ArticuloController::class, 'guardar_imagen'])
->name('articulos.guardar_imagen')->whereNumber('articulo');

require __DIR__.'/auth.php';
