<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EntregasController;
use App\Http\Controllers\EntregasTablasController;

// Página principal → Login
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('login.post');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Página protegida
Route::get('/home', [HomeController::class, 'showHome'])
    ->middleware('auth')
    ->name('home');

// ==========================
// USUARIOS
// ==========================
Route::resource('usuarios', UsuarioController::class)->except(['show']);
Route::delete('usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

// ==========================
// ENTREGAS 
// ==========================
Route::get('/entregas/create', [EntregasController::class, 'create'])->name('entregas.create');
Route::post('/entregas', [EntregasController::class, 'store'])->name('entregas.store');
Route::get('/entregas', [EntregasController::class, 'index'])->name('entregas.index');

// ==========================
// TABLA DE ENTREGAS 
// ==========================
Route::get('/entregas/tablas', [EntregasTablasController::class, 'index'])->name('entregas.tablas');
Route::get('/entregas/{id}/edit', [EntregasTablasController::class, 'edit'])->name('entregas.edit');
Route::put('/entregas/{id}', [EntregasTablasController::class, 'update'])->name('entregas.update');

