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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('empleado', App\Http\Controllers\EmpleadoController::class);
Route::resource('areas', App\Http\Controllers\AreaController::class);
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::resource('empleados_rol', App\Http\Controllers\EmpleadoRolController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
