<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
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
    	$this->Post = new Post();
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function getAllPosts(Request $request)
    {
        //  валидация

        $page = $request->input('page');
        
        $data = $this->Post->getToPage($page);
        $data = json_encode($data);
        return $data;
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function getOnePost(Request $request)
    {
        $idPost = $request->input('id');
        $data = $this->Post->getOnePost($idPost);
        $data = json_encode($data);
        return $data;
    }

    public function getComments(Request $request)
    {
        $idPost = $request->input('id');
        $Comment = new Comment();
        $data = $Comment->getCommentsOnPost($idPost);
        $data = json_encode($data);
        return $data;
    }
}
