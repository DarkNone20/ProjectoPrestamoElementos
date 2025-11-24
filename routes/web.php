<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EntregasController;
use App\Http\Controllers\EntregasTablasController;
use App\Http\Controllers\EntregasEquipoController;
use App\Http\Controllers\EntregasDiscoController;
use App\Http\Controllers\PrestamosController;


// ==========================
// LOGIN
// ==========================
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('login.post');

// ==========================
// LOGOUT
// ==========================
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ==========================
// PAGINACIÓN / HOME
// ==========================
Route::get('/home', [HomeController::class, 'showHome'])
    ->middleware('auth')
    ->name('home');


// ==========================
// USUARIOS DEL SISTEMA
// ==========================
Route::resource('user', UserController::class)->except(['show']);
Route::delete('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');


// ==========================
// USUARIOS ADMINISTRATIVOS
// ==========================
Route::resource('usuarios', UsuarioController::class)->except(['show']);
Route::delete('usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');


// ==========================
// ENTREGAS (Formulario simple)
// ==========================
Route::get('/entregas/create', [EntregasController::class, 'create'])->name('entregas.create');
Route::post('/entregas', [EntregasController::class, 'store'])->name('entregas.store');
Route::get('/entregas', [EntregasController::class, 'index'])->name('entregas.index');


// ==========================
// TABLA DE ENTREGAS (CRUD)
// ==========================
Route::get('/entregas/tablas', [EntregasTablasController::class, 'index'])->name('entregas.tablas');
Route::get('/entregas/{id}/edit', [EntregasTablasController::class, 'edit'])->name('entregas.edit');
Route::put('/entregas/{id}', [EntregasTablasController::class, 'update'])->name('entregas.update');


// ==========================
// TABLA DE PRÉSTAMOS
// ==========================
Route::get('/prestamos', [PrestamosController::class, 'index'])->name('prestamos.index');
Route::get('/prestamos/create', [PrestamosController::class, 'create'])->name('prestamos.create');
Route::post('/prestamos', [PrestamosController::class, 'store'])->name('prestamos.store');


// ==========================
// ENTREGAS DE EQUIPOS (NUEVA TABLA)
// ==========================
Route::get('/entregas-equipos', [EntregasEquipoController::class, 'index'])
    ->name('entregasEquipos.index');

Route::get('/entregas-equipos/create', [EntregasEquipoController::class, 'create'])
    ->name('entregasEquipos.create');

    Route::get('/entregas-equipos/createDos', [EntregasEquipoController::class, 'createDos'])
    ->name('entregasEquipos.createDos');


Route::post('/entregas-equipos', [EntregasEquipoController::class, 'store'])
    ->name('entregasEquipos.store');


Route::patch('/entregas-equipos/{id}/aprobar', [EntregasEquipoController::class, 'aprobar'])
    ->name('entregasEquipos.aprobar');
Route::get('/usuarios/buscar', [UserController::class, 'buscar'])->name('usuarios.buscar');


// ==========================
// ENTREGAS DE DISCOS
// ==========================


Route::get('/entregas-discos', [EntregasDiscoController::class, 'index'])
    ->name('entregasDiscos.index');


Route::get('/entregas-discos/create', [EntregasDiscoController::class, 'create'])
    ->name('entregasDiscos.create');

Route::get('/entregas-discos/createDos', [EntregasDiscoController::class, 'createDos'])
    ->name('entregasDiscos.createDos');


Route::post('/entregas-discos', [EntregasDiscoController::class, 'store'])
    ->name('entregasDiscos.store');

Route::patch('/entregas-discos/{id}/aprobar', [EntregasDiscoController::class, 'aprobar'])
    ->name('entregasDiscos.aprobar');