<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PluginController extends Controller
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
     *  Возвращает страницу с таблицей всех плагинов
     */
    public function plugins()
    {
        return view('plugins');
    }
}