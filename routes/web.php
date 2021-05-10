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
Route::get('/', [App\Http\Controllers\VisitorsController::class, 'getAllPage'])->name('main');
//	одна запись
Route::get('/post', [App\Http\Controllers\VisitorsController::class, 'getOnePage'])->name('post');

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
Route::get('/createPost', [App\Http\Controllers\PostController::class, 'createPost'])->name('createPost')->middleware('role:admin');

//	страница изменения записи
Route::get('/updPost', [App\Http\Controllers\PostController::class, 'updPost'])->name('updPost')->middleware('role:admin');

//	страница всех записей
Route::get('/adminAllPosts', [App\Http\Controllers\PostController::class, 'adminAllPosts'])->name('adminAllPosts')->middleware('role:admin');

//	страница плагинов
Route::get('/plugins', [App\Http\Controllers\PluginController::class, 'plugins'])->name('plugins')->middleware('role:admin');

    //  -----   Действия   -----  //
//  Получить записи для вывода в таблицу админа
Route::post('/getTableAllPosts', [App\Http\Controllers\PostController::class, 'getTablePosts'])->middleware('role:admin');

//  Удалить пост по id
Route::post('/deletePost', [App\Http\Controllers\PostController::class, 'deletePost'])->middleware('role:admin');

//  Обновить пост по id
Route::post('/updatePost', [App\Http\Controllers\PostController::class, 'updatePost'])->middleware('role:admin');

//  Создать пост 
Route::post('/addPost', [App\Http\Controllers\PostController::class, 'addPost'])->middleware('role:admin');

//  Получение данных о плагинах
Route::post('/getPlugins', [App\Http\Controllers\PluginController::class, 'getAllPlugins'])->middleware('role:admin');

//  Установка плагина
Route::post('/installPlugin', [App\Http\Controllers\PluginController::class, 'installPlugin'])->middleware('role:admin');

//  Удаление плагина
Route::post('/deletePlugin', [App\Http\Controllers\PluginController::class, 'deletePlugin'])->middleware('role:admin');