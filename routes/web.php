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
Route::resource('user', UserController::class)->except(['show'])
->middleware('auth');
Route::delete('user/{user}', [UserController::class, 'destroy'])->name('user.destroy')
->middleware('auth');


// ==========================
// USUARIOS ADMINISTRATIVOS
// ==========================
Route::resource('usuarios', UsuarioController::class)->except(['show'])
->middleware('auth');
Route::delete('usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy')
->middleware('auth');


// ==========================
// ENTREGAS (Formulario simple)
// ==========================
Route::get('/entregas/create', [EntregasController::class, 'create'])->name('entregas.create');
Route::post('/entregas', [EntregasController::class, 'store'])->name('entregas.store');
Route::get('/entregas', [EntregasController::class, 'index'])->name('entregas.index');


// ==========================
// TABLA DE ENTREGAS (CRUD)
// ==========================
Route::get('/entregas/tablas', [EntregasTablasController::class, 'index'])->name('entregas.tablas')
->middleware('auth');
Route::get('/entregas/{id}/edit', [EntregasTablasController::class, 'edit'])->name('entregas.edit')
->middleware('auth');
Route::put('/entregas/{id}', [EntregasTablasController::class, 'update'])->name('entregas.update')
->middleware('auth');


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
    ->name('entregasEquipos.index')
    ->middleware('auth');

Route::get('/entregas-equipos/create', [EntregasEquipoController::class, 'create'])
    ->name('entregasEquipos.create')
    ->middleware('auth');

    Route::get('/entregas-equipos/createDos', [EntregasEquipoController::class, 'createDos'])
    ->name('entregasEquipos.createDos');


Route::post('/entregas-equipos', [EntregasEquipoController::class, 'store'])
    ->name('entregasEquipos.store')
    ->middleware('auth');


Route::patch('/entregas-equipos/{id}/aprobar', [EntregasEquipoController::class, 'aprobar'])
    ->name('entregasEquipos.aprobar')
    ->middleware('auth');
Route::get('/usuarios/buscar', [UserController::class, 'buscar'])->name('usuarios.buscar')
->middleware('auth');

Route::get('/entregas-equipos/{id}/edit', [EntregasEquipoController::class, 'edit'])->name('entregasEquipos.edit')
->middleware('auth');
Route::put('/entregas-equipos/{id}', [EntregasEquipoController::class, 'update'])->name('entregasEquipos.update')
->middleware('auth');
Route::delete('/entregas-equipos/{id}', [EntregasEquipoController::class, 'destroy'])->name('entregasEquipos.destroy')
->middleware('auth');


// ==========================
// ENTREGAS DE DISCOS
// ==========================


Route::get('/entregas-discos', [EntregasDiscoController::class, 'index'])
    ->name('entregasDiscos.index')
    ->middleware('auth');


Route::get('/entregas-discos/create', [EntregasDiscoController::class, 'create'])
    ->name('entregasDiscos.create')
    ->middleware('auth');

Route::get('/entregas-discos/createDos', [EntregasDiscoController::class, 'createDos'])
    ->name('entregasDiscos.createDos');


Route::post('/entregas-discos', [EntregasDiscoController::class, 'store'])
    ->name('entregasDiscos.store')
    ->middleware('auth');

Route::patch('/entregas-discos/{id}/aprobar', [EntregasDiscoController::class, 'aprobar'])
    ->name('entregasDiscos.aprobar')
    ->middleware('auth');

Route::get('/entregas-discos/{id}/edit', [EntregasDiscoController::class, 'edit'])->name('entregasDiscos.edit')
    ->middleware('auth');
Route::put('/entregas-discos/{id}', [EntregasDiscoController::class, 'update'])->name('entregasDiscos.update')
    ->middleware('auth');
Route::delete('/entregas-discos/{id}', [EntregasDiscoController::class, 'destroy'])->name('entregasDiscos.destroy')
    ->middleware('auth');