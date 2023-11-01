<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;

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

Route::get('/', [ProyectoController::class,'mostrar'])->name('principal');
Route::post('/enviar', [ProyectoController::class,'crear'])->name('crear');

Route::get('/consultar', [ProyectoController::class,'consultar']);

Route::get('/cambiar/{id}', [ProyectoController::class,'obtenerid'])->name('editar');
Route::put('/editar/{id}', [ProyectoController::class,'editar'])->name('actualizar');


Route::get('/elegir/{id}',[ProyectoController::class,'obtenerid2'])->name('elegir');
Route::delete('/eliminar/{id}', [ProyectoController::class,'eliminar'])->name('eliminar');

Route::get('/generarPDF', [ProyectoController::class,'informe']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
