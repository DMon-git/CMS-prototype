<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 *  класс возвращает данные для страниц не требующих авторизации:
 *      страница всех постов, страница конкретного поста
 */
class VisitorsController extends Controller
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

    public function getAllPosts(Request $request)
    {
        return json_encode(["Типо я отдал тебе данные о всех постах на конкретную страницу"]);
    }

    public function getOnePost(Request $request)
    {
        return json_encode(["Типо я отдал тебе данные об одной записи"]);
    }
}
