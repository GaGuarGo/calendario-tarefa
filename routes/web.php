<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TarefaController;
use App\Models\Tarefa;
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


Route::middleware('auth')->group(static function () {

    Route::delete('logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::resource('tarefa', TarefaController::class);
    Route::put('tarefa/{tarefa}/switchStatus', [TarefaController::class, 'switchStatus'])->name('tarefa.status');
    Route::put('tarefa/{tarefa}/restore', [TarefaController::class, 'restore'])->name('tarefa.restore');
    Route::delete('tarefa/{tarefa}/forceDestroy', [TarefaController::class, 'forceDestroy'])->name('tarefa.forceDestroy');

//    Route::get('api/tarefas', [TarefaController::class, 'getUserTasksJson'])->name('tarefa.api');
    Route::get('/calendario', [TarefaController::class, 'calendar'])->name('tarefa.calendar');

});

Route::get('/meu-calendario/{url}', [TarefaController::class, 'publicCalendar'])->name('tarefa.public-calendar');


