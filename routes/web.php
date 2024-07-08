<?php

use App\Http\Controllers\TestController;
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

Route::get('/', [TestController::class, 'index'])->name('get.index');
Route::post('/', [TestController::class, 'create'])->name('post.create');
Route::get('/detail/{id}', [TestController::class, 'detail'])->name('get.detail');
Route::post('/update', [TestController::class, 'update'])->name('post.update');
Route::post('/delete/{id}', [TestController::class, 'delete'])->name('post.delete');


