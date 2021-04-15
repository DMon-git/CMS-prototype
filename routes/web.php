<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//	все запси
Route::get('/', function () {
    return view('main');
})->name('main');
//	одна запись
Route::get('/post', function () {
    return view('post');
})->name('post');


Auth::routes();
//	главная страница личного кабинета
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');

//	страница создания записи
Route::get('/createPost', [App\Http\Controllers\DashboardController::class, 'createPost'])->name('createPost');

//	страница изменения записи
Route::get('/updPost', [App\Http\Controllers\DashboardController::class, 'updPost'])->name('updPost');

//	страница всех записей
Route::get('/adminAllPosts', [App\Http\Controllers\DashboardController::class, 'adminAllPosts'])->name('adminAllPosts');

//	страница плагинов
Route::get('/plugins', [App\Http\Controllers\DashboardController::class, 'plugins'])->name('plugins');