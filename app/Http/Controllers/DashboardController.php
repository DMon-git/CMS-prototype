<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

/**
 *  класс возвращает только html страницы
 *  для оперирования бизнес-логикой используются остальные контроллеры
 */
class DashboardController extends Controller
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
     * Возвращаем информацию о пользователе на страницу личного кабинета
     *
     * @return false|string
     */
    public function getUserInfo()
    {
        $data = $this->getUserInfo();
        $data = json_encode($data);
        return $data;
    }
}