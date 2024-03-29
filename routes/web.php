<?php

use Illuminate\Support\Facades\Route;
use App\Repositories\ProjectRepository;
use App\Repositories\TaskRepository;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;

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

Route::get('/', function () {
    return view('Home');
})->name('index');

Route::resource('tasks', TaskController::class);
Route::resource('projects', ProjectController::class);
Route::get('task/{id}', [TaskController::class, 'index'])->name('task');
Route::fallback(function () {
    return view('Layouts.Error404');
});