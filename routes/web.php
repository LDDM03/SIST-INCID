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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reportar', [App\Http\Controllers\HomeController::class, 'report'])->name('report');

Route::group(['middleware' => ['auth']], function () {
        
    Route::get('/usuarios', [App\Http\Controllers\Admin\ConfigController::class, 'index'])->name('usuarios');
    Route::get('/proyectos', [App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('proyectos');
    Route::get('/config', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('config');

});

