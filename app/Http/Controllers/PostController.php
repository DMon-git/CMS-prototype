<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    private $Post;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->Post = new Post();
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
     *
     */
    public function getTablePosts(Request $request)
    {
        //  валидация
        //  проверка прав
        $page = $request->input('page');
        $data = $this->Post->getToTable($page);
        $data = json_encode($data);
        return $data;
    }

    /**
     *
     */
    public function deletePost(Request $request)
    {
        $idPost = $request->input('id');
        $result = $this->Post->deletePost($idPost);
        return $result;
    }
}