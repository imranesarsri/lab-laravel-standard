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

// test project methods
// Route::get('test_project_index', [ProjectRepository::class, 'getData']);
// test task methods
// Route::get('test_task_index', [TaskRepository::class, 'getData']);
// Route::post('test_task_store', [TaskRepository::class, 'store']);
// Route::post('test_task_store', [TaskRepository::class, 'store']);
// http://127.0.0.1:8000/test_task_store?name=maquettage&description=maquettage_cnmh&project_id=1

//
// Route::get('create', function () {
//     return view('Tasks.create');
// });
// Route::post('store', [ProjectController::class, 'store'])->name('task.store');

Route::resource('tasks', TaskController::class);
Route::resource('projects', ProjectController::class);
Route::get('{task}/task', [TaskController::class, 'index'])->name('task');