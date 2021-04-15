<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 *  класс возвращает только html страницы
 *  для оперирования бизнес-логикой используются остальные контроллеры
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *  Возвращает главную страницу личного кабинета
     */
    public function dashboard()
    {
        return view('dashboard');
    }

    /**
     *  Возвращает страницу создание поста
     */
    public function createPost()
    {
        return view('createPost');
    }

    /**
     *  Возвращает страницу изменения поста
     */
    public function updPost()
    {
        return view('updPost');
    }

    /**
     *  Возвращает страницу с таблицей всех постов
     */
    public function adminAllPosts()
    {
        return view('adminAllPosts');
    }

    /**
     *  Возвращает страницу с таблицей всех плагинов
     */
    public function pluginsMarket()
    {
        return view('pluginsMarket');
    }

    /**
     *  Возвращает страницу с таблицей скаченных плагинов
     */
    public function adminAllPlugins()
    {
        return view('adminAllPlugins');
    }

    /**
     *  Возвращает создания пользователя
     *//*
    public function adminCreateUser()
    {
        return view('adminCreateUser');
    }
    
    /**
     *  Возвращает страницу с таблицей всех пользователей
     *//*
    public function adminAllUsers()
    {
        return view('adminAllUsers');
    }
    */
}