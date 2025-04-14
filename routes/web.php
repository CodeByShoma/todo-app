<?php

use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//タスク一覧表示のルート
Route::get('/', [TaskController::class, 'index'])->middleware('auth')->name('tasks.index');

//新規登録のルート
Route::get('/tasks/create', [TaskController::class, 'create'])->middleware('auth')->name('tasks.create');

//登録処理のルート
Route::post('/tasks/store', [TaskController::class, 'store'])->middleware('auth')->name('tasks.store');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
