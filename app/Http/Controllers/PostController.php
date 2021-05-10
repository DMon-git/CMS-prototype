<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

use App\Http\Requests\IdValidateRequest;
use App\Http\Requests\PageValidateRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\AddPostRequest;

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
        $this->Post = Post::getInstance();
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
        $pages = $this->Post->getCountPages($this->Post::ALLPAGE_TABLE_PERPAGE);
        return view('adminAllPosts', compact('pages'));
    }

    /**
     *
     */
    public function getTablePosts(PageValidateRequest $request)
    {
        //  проверка прав
        $page = $request->input('page');
        $data = $this->Post->getToTable($page);
        $data = json_encode($data);
        return $data;
    }

    /**
     *
     */
    public function deletePost(IdValidateRequest $request)
    {
        $idPost = $request->input('id');
        $result = $this->Post->deletePost($idPost);
        return $result;
    }

    /**
     * 
     */
    public function updatePost(UpdatePostRequest $request)
    {
        $data = $request->all();
        $result = $this->Post->updatePost($data);
        return true;
    }

    /**
     * 
     */
    public function addPost(AddPostRequest $request)
    {
        $data = $request->all();
        $data['uid_add']= auth()->user()->id;

        $result = $this->Post->addPost($data);
        return true;
    }
}