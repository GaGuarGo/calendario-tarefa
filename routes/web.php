<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TarefaController;
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

Route::get('/', static fn () =>to_route('tarefa.index'));

Route::get('login', function () {
    return view('auth.login');
});

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', function () {
    return view('auth.register');
});
Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::delete('logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->resource('tarefa',TarefaController::class);


