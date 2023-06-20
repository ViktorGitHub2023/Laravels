<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
//logout
use Illuminate\Support\Facades\Auth;
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
// viktor@laravel
// 12345678
Route::get('/about', function () {
    return view('about');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/list');
})->name('logout');

//Route::get('/list', [TodoController::class, 'getTodos']);

//erre írtam át
Route::get('/list', function () {
    return app()->make(TodoController::class)->getTodos();
})->middleware('auth');

//Route::get('delete/{id}', [TodoController::class, 'deleteTodo']);
Route::middleware(['auth'])->group(function () {
    Route::get('delete/{id}', [TodoController::class, 'deleteTodo']);
});


//Route::get('edit/{id}', [TodoController::class, 'showTodo']);
//Route::post('edit', [TodoController::class, 'update']);
Route::middleware(['auth'])->group(function () {
    Route::get('edit/{id}', [TodoController::class, 'showTodo']);
    Route::post('edit', [TodoController::class, 'update']);
});


//Route::view('add', 'addtodo');
//Route::post('add', [TodoController::class, 'addTodo']);
Route::middleware(['auth'])->group(function () {
    Route::view('add', 'addtodo');
    Route::post('add', [TodoController::class, 'addTodo']);
});


Route::get('/add', function () {
    return view('addtodo');
})->name('add');

require __DIR__.'/auth.php';
