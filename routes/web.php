<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('/',  App\Http\Controllers\Auth\LoginController::class)->middleware('auth');

Auth::routes();

Route::resource('empleado', App\Http\Controllers\EmpleadoController::class)->middleware('auth');
Route::resource('areas', App\Http\Controllers\AreaController::class)->middleware('auth');
Route::resource('roles', App\Http\Controllers\RoleController::class)->middleware('auth');
Route::resource('empleados_rol', App\Http\Controllers\EmpleadoRolController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
