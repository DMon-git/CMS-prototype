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
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

//	страница создания записи
Route::get('/createPost', [App\Http\Controllers\HomeController::class, 'createPost'])->name('createPost');

//	страница изменения записи
Route::get('/updPost', [App\Http\Controllers\HomeController::class, 'updPost'])->name('updPost');

//	страница всех записей
Route::get('/adminAllPosts', [App\Http\Controllers\HomeController::class, 'adminAllPosts'])->name('adminAllPosts');

//	страница маркетплейса
Route::get('/pluginsMarket', [App\Http\Controllers\HomeController::class, 'pluginsMarket'])->name('pluginsMarket');

//	страница скаченных плагинов
Route::get('/adminAllPlugins', [App\Http\Controllers\HomeController::class, 'adminAllPlugins'])->name('adminAllPlugins');