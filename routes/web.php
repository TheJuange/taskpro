<?php

use App\Http\Controllers\TaskController;
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

Route::get('/',[TaskController::class, "index"])->name('index');
Route::get('/create', [TaskController::class, "create"])->name('create');
Route::post('/store', [TaskController::class, "store"])->name('store');
Route::get('/show', [TaskController::class, "getTaskList"])->name('show');
Route::post('/show',[TaskController::class, "show"])->name('search');
Route::get('/show/{id}', [TaskController::class, "show_id"])->name('show_id');
Route::get('/edit/{id}', [TaskController::class, "edit"])->name('edit');
