<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
/**
 *  класс возвращает данные для страниц не требующих авторизации:
 *      страница всех постов, страница конкретного поста
 */
class VisitorsController extends Controller
{
    private $Post;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function getAllPosts(Request $request)
    {
        //  валидация

        $page = $request->input('page');
        $data = Post::getToPage($page);

        return json_encode($data);
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function getOnePost(Request $request)
    {
        $idPost = $request->input('id');
        $data = Post::getOnePost($idPost);

        return json_encode($data);
    }
}
