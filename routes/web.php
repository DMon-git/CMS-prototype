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

//  ------------------------   Без авторизации   ------------------------  //
    //  -----   Возврат вьюх   -----  //
//	все запси
Route::get('/', function () {
    return view('main');
})->name('main');
//	одна запись
Route::get('/post', function () {
    return view('post');
})->name('post');

//  -----   Действия   -----  //
//  Получить все посты на страницу
Route::post('/getposts', [App\Http\Controllers\VisitorsController::class, 'getAllPosts']);
//  Получить конкретный пост
Route::post('/getonepost', [App\Http\Controllers\VisitorsController::class, 'getOnePost']);

//  -------------------------   С авторизацией   ------------------------  //
Auth::routes();

        //  -----   Пользователь   -----  //
    //  -----   Возврат вьюх   -----  //
//	главная страница личного кабинета
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');

    //  -----   Действия   -----  //
Route::post('/getuserinfo', [App\Http\Controllers\DashboardController::class, 'getUserInfo']);
//-----------------------------------------------------------------------------------------------------------//
        //  -----   Админ   -----  //
    //  -----   Возврат вьюх   -----  //
//	страница создания записи
Route::get('/createPost', [App\Http\Controllers\PostController::class, 'createPost'])->name('createPost');

//	страница изменения записи
Route::get('/updPost', [App\Http\Controllers\PostController::class, 'updPost'])->name('updPost');

//	страница всех записей
Route::get('/adminAllPosts', [App\Http\Controllers\PostController::class, 'adminAllPosts'])->name('adminAllPosts');

//	страница плагинов
Route::get('/plugins', [App\Http\Controllers\PluginController::class, 'plugins'])->name('plugins');

    //  -----   Действия   -----  //
//  Получить записи для вывода в таблицу админа
Route::post('/getTableAllPosts', [App\Http\Controllers\PostController::class, 'getTablePosts']);

//  Удалить пост по id
Route::post('/deletePost', [App\Http\Controllers\PostController::class, 'deletePost']);

//  Обновить пост по id
Route::post('/updatePost', [App\Http\Controllers\PostController::class, 'updatePost']);

