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

//完了タスク一覧画面のルート
Route::get('/tasks/completed', [TaskController::class, 'completed'])->middleware('auth')->name('tasks.completed');

//詳細画面のルート
Route::get('/tasks/{id}', [TaskController::class, 'show'])->middleware('auth')->name('tasks.show');

//削除処理のルート
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->middleware('auth')->name('tasks.destroy');

//編集画面のルート
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->middleware('auth')->name('tasks.edit');

//更新処理のルート
Route::put('/tasks/{id}', [TaskController::class, 'update'])->middleware('auth')->name('tasks.update');

//完了処理のルート
Route::patch('/tasks/{id}/complete', [TaskController::class, 'complete'])->middleware('auth')->name('tasks.complete');

//完了タスク一覧画面のルート
Route::get('/tasks/completed', [TaskController::class, 'completed'])->middleware('auth')->name('tasks.completed');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
