<?php

use Illuminate\Support\Facades\Route;
use Illuminate\session\SessionManager;
use Illuminate\Support\Facades\Session;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/todos/index',[App\Http\Controllers\TodoController::class,'index'])->name('todos.index');


Route::get('/todos/create',[App\Http\Controllers\TodoController::class,'create'])->name('todos.create');

Route::get('/todos/edit{id}',[App\Http\Controllers\TodoController::class,'edit'])->name('todos.edit');

Route::post('/todos/store',[App\Http\Controllers\TodoController::class,'store'])->name('todos.store');

Route::get('/todos/show{id}',[App\Http\Controllers\TodoController::class,'show'])->name('todos.show');

Route::put('/todos/update',[App\Http\Controllers\TodoController::class,'update'])->name('todos.update');

Route::delete('/todos/destroy',[App\Http\Controllers\TodoController::class,'destroy'])->name('todos.destroy');
// Route::post('/todos/update2',[App\Http\Controllers\TodoController::class,'update2'])->name('todos.update2');

// Route::delete('/todos/{id}', [App\Http\Controllers\TodoController::class, 'destroy'])->name('todos.destroy');
