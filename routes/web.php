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

//  Получить комментарии к посту
Route::post('/getComments', [App\Http\Controllers\VisitorsController::class, 'getComments']);

//  -------------------------   С авторизацией   ------------------------  //
Auth::routes();

        //  -----   Пользователь   -----  //
    //  -----   Возврат вьюх   -----  //
//	главная страница личного кабинета
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');

    //  -----   Действия   -----  //
//	Вывод информации о пользователе
Route::post('/getuserinfo', [App\Http\Controllers\DashboardController::class, 'getUserInfo']);

//  Добавить комментарий 
Route::post('/addComment', [App\Http\Controllers\CommentController::class, 'addComment']);

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

//  Создать пост 
Route::post('/addPost', [App\Http\Controllers\PostController::class, 'addPost']);

//  Получение данных о плагинах
Route::post('/getPlugins', [App\Http\Controllers\PluginController::class, 'getAllPlugins']);

//  Установка плагина
Route::post('/installPlugin', [App\Http\Controllers\PluginController::class, 'installPlugin']);

//  Удаление плагина
Route::post('/deletePlugin', [App\Http\Controllers\PluginController::class, 'deletePlugin']);