<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EntregasController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/



Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('login.post');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Página protegida
Route::get('/home', [HomeController::class, 'showHome'])
    ->middleware('auth')   
    ->name('home');
//Usuarios

Route::resource('usuarios', UsuarioController::class)->except(['show']);
Route::delete('usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

//Entregas
// Ruta para mostrar el formulario de creación de entrega (GET)
Route::get('/entregas/create', [EntregasController::class, 'create'])->name('entregas.create');

// Ruta para procesar el envío del formulario y almacenar la entrega (POST)
Route::post('/entregas', [EntregasController::class, 'store'])->name('entregas.store');

// Opcional: Ruta para mostrar la lista de todas las entregas
Route::get('/entregas', [EntregasController::class, 'index'])->name('entregas.index');

// Puedes usar Route::resource si tienes un CRUD completo
// Route::resource('entregas', EntregasController::class);
